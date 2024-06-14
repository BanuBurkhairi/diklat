<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainingController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TrainingController::class, 'index'])->name('dashboard');
    Route::get('/trainings/user', [TrainingController::class, 'userTrainings'])->name('trainings.user');
    Route::resource('trainings', TrainingController::class);
});
