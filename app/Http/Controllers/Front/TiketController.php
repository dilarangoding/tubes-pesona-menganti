<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TiketController extends Controller
{


    public function tiket()
    {
        return view('front.booking.index');
    }
}
