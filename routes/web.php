<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SauceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\SauceController as APISauceController;

Route::get('/', [SauceController::class, 'index'])->name('home');

// Routes d'authentification
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerSave']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes des sauces avec authentification
Route::resource('sauces', SauceController::class)->middleware('auth');

// Routes API
Route::prefix('api')->middleware('auth:sanctum')->group(function () {
    Route::get('/sauces', [APISauceController::class, 'index']);
    Route::post('/sauces', [APISauceController::class, 'store']);
    Route::get('/sauces/{id}', [APISauceController::class, 'show']);
    Route::put('/sauces/{id}', [APISauceController::class, 'update']);
    Route::delete('/sauces/{id}', [APISauceController::class, 'destroy']);
});