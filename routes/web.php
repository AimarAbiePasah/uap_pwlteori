<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

// Redirect to login page when accessing the root URL
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication routes
Route::get('/login', [ProfileController::class, 'showLogin'])->name('login');
Route::post('/login', [ProfileController::class, 'login']);
Route::get('/register', [ProfileController::class, 'showRegister'])->name('register');
Route::post('/register', [ProfileController::class, 'register']);
Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');

// Common routes for both User and Admin
Route::middleware(['auth'])->group(function () {
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    
    Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');
});


// Routes for User with specific actions
Route::middleware(['auth', 'checkRole:user'])->group(function () {
    Route::get('/user/dashboard', [PropertyController::class, 'showUserDashboard'])->name('user_dashboard');
});

// Routes for Admin with additional actions for managing properties
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('/admin/dashboard', [PropertyController::class, 'showAdminDashboard'])->name('admin_dashboard');
});
