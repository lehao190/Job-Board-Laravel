<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;

// Users routes for CRUD
Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('users', UserController::class);
});

// Routes for authentication
Route::controller(AuthenticationController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/employer-register', 'registerAsEmployer');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});
