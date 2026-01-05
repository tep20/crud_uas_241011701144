<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkshopController;

// Route Tamu (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

// Route Member (Sudah Login)
    Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/workshops/export-pdf', [WorkshopController::class, 'exportPdf'])->name('workshops.export-pdf');
    Route::resource('workshops', WorkshopController::class);

    Route::get('/', function () { return view('pages.home'); });
    Route::get('/about', function () { return view('pages.about'); });
    
});