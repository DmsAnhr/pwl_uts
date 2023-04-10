<?php


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
Route::get('/barang', function () {
    return view('content/barang/barang');
});
Route::get('/pengiriman', function () {
    return view('content/pengiriman/pengiriman');
});
Route::get('/user', function () {
    return view('content/user/user');
});

Route::get('/test', function () {
    return view('content/test');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
