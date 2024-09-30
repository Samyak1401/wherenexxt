<?php

use App\Http\Controllers\AdminController;
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
    Route::get('/customer/logout', 'logout')->name('customer.logout');
});

Route::get('/admin/login', [AdminController::class, 'index']);
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/customer/view', [AdminController::class, 'customer'])->name('customer.view');
