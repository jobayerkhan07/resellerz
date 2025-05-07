<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Reseller\ResellerDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Dashboard Route
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'role:Admin'])
    ->name('admin.dashboard');

// Reseller Dashboard Route
Route::get('/reseller/dashboard', [ResellerDashboardController::class, 'index'])
    ->middleware(['auth', 'role:Reseller'])
    ->name('reseller.dashboard');

// Client Dashboard Route
Route::get('/client/dashboard', [ClientDashboardController::class, 'index'])
    ->middleware(['auth', 'role:Client'])
    ->name('client.dashboard');


require __DIR__.'/auth.php';
