<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;




/*Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/


Route::get('/', function () {
    return view('index');
})->name('customer.home');


Route::group(['prefix' => 'customer'], function () {

    Route::get('/login', [LoginController::class, 'index'])->name('customer.loginview');
    Route::post('/login/process', [LoginController::class, 'login'])->name('customer.login');
    Route::get('/register', [RegistrationController::class, 'index'])->name('customer.registerview');
    Route::post('/register/process', [RegistrationController::class, 'register'])->name('customer.register');
    Route::get('/logout', [LoginController::class, 'logout'])->name('customer.logout');
});

Route::get('/verify-otp', [LoginController::class, 'verifyotp'])->name('verify.otp');
Route::post('/verify-otp', [LoginController::class, 'verifyOtp']);

Route::get('/verifyotp', [LoginController::class, 'showotpform'])->name('showotpform');

Route::group(['prefix' => 'admin'], function () {
    Route::controller(AdminController::class)->group(function () {;
        Route::get('/login', 'index');
        Route::post('/login', 'login')->name('admin.login');
        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/customer/view', 'customer')->name('customer.view');
        Route::get('/addpackage', 'AddPackage')->name('AddPackageView');
        Route::post('/addpackage', 'storePackage')->name('storePackage');
        Route::get('/additinerary/{id}', 'ViewItinerary')->name('AddItineraryview');
    });
});

Route::get('/', [AdminController::class, 'displaypackage'])->name('home');
