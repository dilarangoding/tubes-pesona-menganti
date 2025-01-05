<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\BookingController;


Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware(Authenticate::using('sanctum'));


Route::post('/midtrans-callback', [BookingController::class, 'callback']);
