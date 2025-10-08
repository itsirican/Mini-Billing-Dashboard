<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// })->name("dashboard");
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers');

Route::get('/customers/create', function() {
    return view('customer.create');
})->name('customer.create');

// Route::get('/custumers', function () {
//     return view('custumers');
// })->name('custumers');

Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');
Route::get('/invoices/create', function() {
    return view('invoice.create');
})->name('invoice.create');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');