<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PengirimanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('content/dashboard');
});

Route::resource('/barang', BarangController::class)->parameter('barang', 'id');

Route::resource('/pengiriman', PengirimanController::class)->parameter('pengiriman', 'id');

Route::get('/user', function () {
    return view('content/user/user');
});

Route::get('/test', function () {
    return view('content/test');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');