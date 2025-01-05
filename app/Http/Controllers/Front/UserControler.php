<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class UserControler extends Controller
{
  public function dashboard()
  {
    $orders = Ticket::selectRaw('COALESCE(sum(CASE WHEN status = 0 THEN subtotal END), 0) as pending,
        COALESCE(count(CASE WHEN status = 1 THEN subtotal END), 0) as paid')
      ->where('user_id', auth()->user()->id)->get();


    return view('front.users.dashboard', compact('orders'));
  }

  public function tiket()
  {

    $tiket = Ticket::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);

    return view('front.users.tiket', compact('tiket'));
  }

  public function downloadTiket($invoice)
  {
    $customPaper = [0, 0, 300.00, 430.80];
    $tiket = Ticket::with(['ticketDetail'])->where([['user_id', Auth::user()->id], ['invoice', $invoice]])->first();
    $pdf = PDF::loadview('front.users.downloadtiket', compact('tiket'))->setPaper($customPaper, 'potrait');
    return $pdf->download('TIKET-' . $tiket->invoice . '.pdf');
  }
}
