<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;

// Rute default untuk mengarahkan ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Rute untuk halaman login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute dengan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TrainingController::class, 'index'])->name('dashboard');
    Route::get('/trainings/user', [TrainingController::class, 'userTrainings'])->name('trainings.user');
    Route::resource('trainings', TrainingController::class);
});