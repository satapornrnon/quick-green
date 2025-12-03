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
use App\Http\Controllers\Backoffice\Login_controller as Backend_login_controller;
use App\Http\Controllers\Backoffice\Logout_controller as Backend_logout_controller;
use App\Http\Controllers\Backoffice\Dashboard_controller as Backend_dashboard_controller;
use App\Http\Controllers\Backoffice\Interested_controller as Backend_interested_controller;
use App\Http\Controllers\Backoffice\Product_controller as Backend_product_controllerr;
use App\Http\Controllers\Backoffice\Roles_controller as Backend_roles_controller;
use App\Http\Controllers\Backoffice\User_controller as Backend_user_controller;
use App\Http\Controllers\Backoffice\Settings_controller as Backend_settings_controller;

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

    // ================= Login ไม่ต้องใช้ auth =================
    Route::prefix('login')->group(function () {
        Route::get('/', [Backend_login_controller::class, 'index'])->name('login');
        Route::post('authenticate', [Backend_login_controller::class, 'authenticate']);
    });

    // ================= Logout =================
    Route::prefix('logout')->group(function () {
        Route::get('/', [Backend_logout_controller::class, 'logout'])->name('logout');
    });

    // ================= ส่วนที่ต้อง Login เท่านั้น =================
    Route::middleware('checklogin')->group(function () {
        
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [Backend_dashboard_controller::class, 'index'])->name('dashboard');
            Route::post('get_data', [Backend_dashboard_controller::class, 'get_data']);
        });

        Route::prefix('interested')->group(function () {
            Route::get('/', [Backend_interested_controller::class, 'index'])->name('interested');
            Route::post('get_data', [Backend_interested_controller::class, 'get_data']);
            Route::post('get_detail', [Backend_interested_controller::class, 'get_detail']);
            Route::post('save', [Backend_interested_controller::class, 'save']);
            Route::post('deleted', [Backend_interested_controller::class, 'deleted']);
        });

        Route::prefix('product')->group(function () {
            Route::get('/', [Backend_product_controllerr::class, 'index'])->name('product');
            Route::post('get_data', [Backend_product_controllerr::class, 'get_data']);
            Route::post('get_detail', [Backend_product_controllerr::class, 'get_detail']);
            Route::post('save', [Backend_product_controllerr::class, 'save']);
            Route::post('deleted', [Backend_product_controllerr::class, 'deleted']);
        });

        Route::prefix('roles')->group(function () {
            Route::get('/', [Backend_roles_controller::class, 'index'])->name('roles');
            Route::post('get_data', [Backend_roles_controller::class, 'get_data']);
            Route::post('get_detail', [Backend_roles_controller::class, 'get_detail']);
            Route::post('get_view_detail', [Backend_roles_controller::class, 'get_view_detail']);
            Route::post('save', [Backend_roles_controller::class, 'save']);
            Route::post('deleted', [Backend_roles_controller::class, 'deleted']);
        });

        Route::prefix('user')->group(function () {
            Route::get('/', [Backend_user_controller::class, 'index'])->name('user');
            Route::post('get_data', [Backend_user_controller::class, 'get_data']);
            Route::post('get_detail', [Backend_user_controller::class, 'get_detail']);
            Route::post('get_view_detail', [Backend_user_controller::class, 'get_view_detail']);
            Route::post('save', [Backend_user_controller::class, 'save']);
            Route::post('deleted', [Backend_user_controller::class, 'deleted']);
        });

        Route::prefix('settings')->group(function () {
            Route::get('/', [Backend_settings_controller::class, 'genenal'])->name('settings');
            Route::post('get_setting_genenal', [Backend_settings_controller::class, 'get_setting_genenal']);
            Route::post('save_genenal', [Backend_settings_controller::class, 'save_genenal']);
        });
    }); // END auth middleware
});
//======== Backoffice ========//