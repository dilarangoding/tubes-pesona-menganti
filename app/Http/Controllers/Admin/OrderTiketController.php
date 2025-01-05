<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class OrderTiketController extends Controller
{
    public function index()
    {

        $tiket = Ticket::with('detail')->orderBy('created_at', 'DESC');
        if (request()->s) {
            $tiket = $tiket->whereBetween('booking_date', [request()->s, request()->e]);
        }

        $tiket = $tiket->get();
        return view('admin.tiket.index', compact('tiket'));
    }
}
