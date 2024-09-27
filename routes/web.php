<?php

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

Route::view('/', 'index')->name('customer.home');
Route::controller(RegistrationController::class)->group(function () {
    Route::get('/customer/register', 'index')->name('customer.registerview');
    Route::post('/customer/register', 'register')->name('customer.register');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/customer/login', 'index')->name('customer.loginview');
    Route::post('/customer/login', 'login')->name('customer.login');
});
