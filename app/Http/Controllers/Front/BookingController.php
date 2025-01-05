<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pantai;
use App\Models\Ticket;
use App\Models\TicketDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class BookingController extends Controller
{
  public function getCarts()
  {
    $carts = json_decode(request()->cookie('jg-carts'), true);
    $carts = $carts != '' ? $carts : [];

    return $carts;
  }

  public function getSubtotal()
  {
    $carts = $this->getCarts();
    $subtotal = collect($carts)->sum(function ($i) {
      return $i['ticket_price'] * $i['qty'];
    });

    return $subtotal;
  }

  public function index()
  {
    $pantai = Pantai::first();

    return view('front.booking.index', compact('pantai'));
  }


  public function addToCart(Request $req)
  {

    $req->validate([
      'pantai_id'      => 'required|exists:pantais,id',
      'qty'           => 'required|integer',
      'booking_date'  => 'required',
    ]);

    $carts = $this->getCarts();

    if (!Auth::check()) {
      return back()->with('error', 'Silahkan login terlebih dahulu');
    }


    if ($carts && array_key_exists($req->pantai_id, $carts)) {
      $carts[$req->pantai_id]['qty'] += $req->qty;
    } else {
      $pantai = Pantai::find($req->pantai_id);

      $carts[1] = [
        'qty'             => $req->qty,
        'pantai_id'      => $pantai->id,
        'pantai_name'    => $pantai->name,
        'ticket_price'    => $pantai->ticket_price,
        'booking_date'    => $req->booking_date
      ];
    }

    $cookie = cookie('jg-carts', json_encode($carts), 2880);

    return redirect(route('booking.checkout'))->cookie($cookie);
  }


  public function checkout()
  {
    $carts = $this->getCarts();
    $subtotal = $this->getSubtotal();

    if ($carts == null) {
      return redirect()->intended();
    }


    return view('front.booking.checkout', compact('carts', 'subtotal'));
  }


  public function storeCheckout(Request $req)
  {


    DB::beginTransaction();
    try {
      $carts = $this->getCarts();


      $subtotal = collect($carts)->sum(function ($q) {
        return $q['qty'] * $q['ticket_price'];
      });


      $ticket = Ticket::create([
        'user_id'           => Auth::user()->id,
        'invoice'           => Str::random(6) . '-' . time(),
        'booking_date'      => $carts[1]['booking_date'],
        'subtotal'          => $subtotal,
        'status'            => 0,
      ]);

      foreach ($carts as $item) {
        $ticket = Ticket::find($ticket->id);
        TicketDetail::create([
          'ticket_id' => $ticket->id,
          'pantai_id'  => $item['pantai_id'],
          'price'     => $item['ticket_price'],
          'qty'       => $item['qty']
        ]);
      }


      \Midtrans\Config::$serverKey = config('midtrans.server_key');
      \Midtrans\Config::$isProduction = false;
      \Midtrans\Config::$isSanitized = true;
      \Midtrans\Config::$is3ds = true;

      $params = array(
        'transaction_details' => array(
          'order_id'     => $ticket->invoice,
          'gross_amount' => $ticket->subtotal,
        )
      );

      $snapToken = \Midtrans\Snap::getSnapToken($params);
      $ticket->snap_token = $snapToken;
      $ticket->save();

      DB::commit();

      $carts = [];
      $cookie = cookie('jg-carts', json_encode($carts), 2880);

      return redirect(route('booking.pay', $ticket->invoice))->cookie($cookie);
    } catch (\Throwable $th) {
      DB::rollback();
      return back()->with('error', $th->getMessage());
    }
  }


  public function pay($invoice)
  {
    if (Ticket::where('invoice', $invoice)->exists()) {

      $ticket = Ticket::with(['ticketDetail.pantai'])->where('invoice', $invoice)->first();

      return view('front.booking.pay', compact('ticket'));
    }

    return back();
  }


  public function callback(Request $req)
  {


    $serverKey = config('midtrans.server_key');
    $hashed = hash("sha512", $req->order_id . $req->status_code . $req->gross_amount . $serverKey);
    if ($hashed == $req->signature_key) {
      if ($req->transaction_status == 'capture' || $req->transaction_status == 'settlement') {
        $ticket = Ticket::where('invoice', $req->order_id)->first();
        $ticket->update(['status' => 1]);

        Payment::create([
          'ticket_id'       => $ticket->id,
          'payment_type'    => $req->payment_type,
          'transfer_date'   => $req->transaction_time,
          'amount'          => $req->gross_amount
        ]);
      }
    }
  }

  public function invoice($inv)
  {
    if (Ticket::where('invoice', $inv)->exists()) {

      $ticket = Ticket::with(['ticketDetail.pantai'])->where('invoice', $inv)->first();

      return view('front.booking.invoice', compact('ticket'));
    }

    return back();
  }
}
