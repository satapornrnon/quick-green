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

Route::get('/', [App\Http\Controllers\Homepage_controller::class, 'index'])->name('homepage');

Route::get('/product/solar', [App\Http\Controllers\Product_controller::class, 'solar'])->name('solar');
Route::get('/product/inverter', [App\Http\Controllers\Product_controller::class, 'inverter'])->name('inverter');
Route::get('/product/sensor', [App\Http\Controllers\Product_controller::class, 'sensor'])->name('sensor');
Route::post('/product/save', [App\Http\Controllers\Product_controller::class, 'save']);

Route::get('/our_work', [App\Http\Controllers\Our_work_controller::class, 'index'])->name('our_work');

Route::get('/contact_us', [App\Http\Controllers\Contact_us_controller::class, 'index'])->name('contact_us');