<?php


use App\Http\Controllers\Admin\PantaiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KulinerController;
use App\Http\Controllers\Admin\OrderTiketController;
use App\Http\Controllers\Admin\PenginapanController;
use App\Http\Controllers\Front\BookingController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\TiketController;
use App\Http\Controllers\Front\UserControler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/penginapan', [FrontController::class, 'penginapan'])->name('front.penginapan');
Route::get('/kuliner', [FrontController::class, 'kuliner'])->name('front.kuliner');
Route::get('/ticket', [BookingController::class, 'index'])->name('booking.index');
Route::post('/midtrans-callback', [BookingController::class, 'callback']);

Auth::routes(['verify' => true]);

Route::prefix('booking')->middleware('role:user', 'verified')->group(function () {
  Route::post('/cart', [BookingController::class, 'addToCart'])->name('booking.cart');
  Route::get('/checkout', [BookingController::class, 'checkout'])->name('booking.checkout');
  Route::post('/store_checkout', [BookingController::class, 'storeCheckout'])->name('booking.store_checkout');
  Route::get('/payment/{invoice}', [BookingController::class, 'pay'])->name('booking.pay');
  Route::get('/invoice/{inv}', [BookingController::class, 'invoice'])->name('booking.invoice');
});


Route::prefix('admin')->middleware(['role:admin'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::get('/user', [DashboardController::class, 'user'])->name('admin.user');

  Route::prefix('pantai')->group(function () {
    Route::get('/', [PantaiController::class, 'index'])->name('admin.pantai.index');
    Route::get('/create', [PantaiController::class, 'create'])->name('admin.pantai.create');
    Route::post('/store', [PantaiController::class, 'store'])->name('admin.pantai.store');
    Route::get('/edit/{id}', [PantaiController::class, 'edit'])->name('admin.pantai.edit');
    Route::post('/update/{id}', [PantaiController::class, 'update'])->name('admin.pantai.update');
  });

  Route::prefix('tiket')->group(function () {
    Route::get('/', [OrderTiketController::class, 'index'])->name('admin.tiket.index');
  });

  Route::prefix('kuliner')->group(function () {
    Route::get('/', [KulinerController::class, 'index'])->name('admin.kuliner.index');
    Route::get('/create', [KulinerController::class, 'create'])->name('admin.kuliner.create');
    Route::post('/store', [KulinerController::class, 'store'])->name('admin.kuliner.store');
    Route::get('/edit/{id}', [KulinerController::class, 'edit'])->name('admin.kuliner.edit');
    Route::get('/delete/{id}', [KulinerController::class, 'delete'])->name('admin.kuliner.delete');
    Route::post('/update/{id}', [KulinerController::class, 'update'])->name('admin.kuliner.update');
  });



  Route::prefix('penginapan')->group(function () {
    Route::get('/', [PenginapanController::class, 'index'])->name('admin.penginapan.index');
    Route::get('/create', [PenginapanController::class, 'create'])->name('admin.penginapan.create');
    Route::post('/store', [PenginapanController::class, 'store'])->name('admin.penginapan.store');
    Route::get('/edit/{id}', [PenginapanController::class, 'edit'])->name('admin.penginapan.edit');
    Route::get('/delete/{id}', [PenginapanController::class, 'delete'])->name('admin.penginapan.delete');
    Route::post('/update/{id}', [PenginapanController::class, 'update'])->name('admin.penginapan.update');
  });
});



Route::middleware('role:user', 'verified')->group(function () {
  Route::get('/dashboard', [UserControler::class, 'dashboard'])->name('dashboard');
  Route::get('/tiket', [UserControler::class, 'tiket'])->name('user.tiket');
  Route::get('/downloadtiket/{invoice}', [UserControler::class, 'downloadTiket'])->name('user.downloadTiket');
});
