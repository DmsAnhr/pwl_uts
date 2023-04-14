<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('content/dashboard');
    });

    Route::get('/user', function () {
        return view('content/user/user');
    });

    Route::resource('/barang', BarangController::class)->parameter('barang', 'id');

    Route::resource('/pengiriman', PengirimanController::class)->parameter('pengiriman', 'id');
});
