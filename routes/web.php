<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechnicianAuthController;
use App\Http\Controllers\CustomerAuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/technician/login', [TechnicianAuthController::class, 'showLogin'])->name('technician.login');
Route::post('/technician/login', [TechnicianAuthController::class, 'login']);

Route::get('/technician/register', [TechnicianAuthController::class, 'showRegister'])->name('technician.register');
Route::post('/technician/register', [TechnicianAuthController::class, 'register']);

Route::post('/technician/logout', [TechnicianAuthController::class, 'logout'])->name('technician.logout');

Route::get('/technician/dashboard', function () {
    return view('dashboard.technician');
})->middleware('auth:technician')->name('technician.dashboard');

Route::get('/customer/login', [CustomerAuthController::class, 'showLogin'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'login']);

Route::get('/customer/register', [CustomerAuthController::class, 'showRegister'])->name('customer.register');
Route::post('/customer/register', [CustomerAuthController::class, 'register']);

Route::post('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

Route::get('/customer/dashboard', function () {
    return view('dashboard.customer');
})->middleware('auth:customer')->name('customer.dashboard');
