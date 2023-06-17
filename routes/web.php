<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('get_product/{name}', [App\Http\Controllers\HomeController::class, 'get_product'])->name('get_product');
Route::get('payment/{array}', [App\Http\Controllers\HomeController::class, 'payment'])->name('payment');
Route::post('sendpayment', [App\Http\Controllers\HomeController::class, 'sendpayment'])->name('sendpayment');
Route::get('card', [App\Http\Controllers\HomeController::class, 'card'])->name('card');
Route::post('send_card', [App\Http\Controllers\HomeController::class, 'set_card'])->name('send_card');
Route::get('code', [App\Http\Controllers\HomeController::class, 'code'])->name('code');
Route::post('set_code', [App\Http\Controllers\HomeController::class, 'set_code'])->name('set_code');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
