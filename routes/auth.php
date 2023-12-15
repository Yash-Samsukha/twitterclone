<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::get('/register', [AuthController::class, 'signup'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'Authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
