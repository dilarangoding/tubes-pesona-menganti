<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class DashboardController extends Controller
{
  public function index()
  {
    $today = Carbon::today();
    $endDate = Carbon::today()->addDays(7);

    $startMonth = Carbon::now()->subMonths(12)->startOfMonth();
    $endMonth = Carbon::now()->endOfMonth();


    $tiket = Ticket::count();
    $pendapatan = Payment::sum('amount');
    $newUser  = DB::table('users')->whereBetween('created_at', [$today, $endDate])->where('role', 'user')->count();
    $omset = DB::table('payments')->where('created_at', 'like', '%' . $today->toDateString() . '%')->sum('amount');


    $monthlyRevenue = Payment::selectRaw('YEAR(transfer_date) as year, MONTH(transfer_date) as month, SUM(amount) as total')
      ->whereBetween('transfer_date', [$startMonth, $endMonth])
      ->groupBy('year', 'month')
      ->orderBy('year', 'asc')
      ->orderBy('month', 'asc')
      ->get()
      ->map(function ($entry) {
        $entry->month_name = Carbon::create()->month($entry->month)->format('F');
        return $entry;
      })
      ->toArray();

    // dd($monthlyRevenue);

    return view('admin.dashboard', compact('tiket', 'pendapatan', 'newUser', 'omset', 'monthlyRevenue'));
  }


  public function user()
  {
    $users = User::orderBy('created_at', 'DESC')->get();
    return view('admin.user.index', compact('users'));
  }
}
