<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// })->name("dashboard");
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/custumers', function () {
    return view('custumers');
})->name('custumers');

Route::get('/custumers/create', function() {
    return view('custumer.create');
})->name('custumer.create');

Route::get('/custumers', function () {
    return view('custumers');
})->name('custumers');

Route::get('/invoices', function () {
    return view('invoices');
})->name('invoices');
Route::get('/invoices/create', function() {
    return view('invoice.create');
})->name('invoice.create');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');