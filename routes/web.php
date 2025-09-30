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

use App\Http\Controllers\Homepage_controller as Frontend_homepage_controller;
use App\Http\Controllers\Product_controller as Frontend_product_controller;
use App\Http\Controllers\Our_work_controller as Frontend_our_work_controller;
use App\Http\Controllers\Contact_us_controller as Frontend_contact_us_controller;
use App\Http\Controllers\Backoffice\Dashboard_controller as Backend_dashboard_controller;
use App\Http\Controllers\Backoffice\Interested_controller as Backend_interested_controller;
use App\Http\Controllers\Backoffice\Product_controller as Backend_product_controllerr;
use App\Http\Controllers\Backoffice\Roles_controller as Backend_roles_controller;
use App\Http\Controllers\Backoffice\User_controller as Backend_user_controller;
use App\Http\Controllers\Backoffice\Setting_controller as Backend_setting_controller;

//======== Frontend ========//
Route::get('/', [Frontend_homepage_controller::class, 'index'])->name('homepage');

Route::prefix('product')->group(function () {
    Route::get('/solar', [Frontend_product_controller::class, 'solar'])->name('solar');
    Route::get('/inverter', [Frontend_product_controller::class, 'inverter'])->name('inverter');
    Route::get('/sensor', [Frontend_product_controller::class, 'sensor'])->name('sensor');
    Route::post('/save', [Frontend_product_controller::class, 'save']);
});

Route::get('/our-work', [Frontend_our_work_controller::class, 'index'])->name('our_work');

Route::get('/contact-us', [Frontend_contact_us_controller::class, 'index'])->name('contact_us');
//======== Frontend ========//

//======== Backoffice ========//
Route::prefix('backoffice')->group(function () {
    Route::get('/', [Backend_dashboard_controller::class, 'index'])->name('dashboard');
    Route::get('/interested', [Backend_interested_controller::class, 'index'])->name('interested');

    Route::prefix('product')->group(function () {
        Route::get('/', [Backend_product_controllerr::class, 'index'])->name('product');
        Route::post('/save', [Backend_product_controllerr::class, 'save']);
    });

    Route::get('/roles', [Backend_roles_controller::class, 'index'])->name('roles');
    Route::get('/user', [Backend_user_controller::class, 'index'])->name('user');
    Route::get('/setting', [Backend_setting_controller::class, 'index'])->name('setting');
});
//======== Backoffice ========//