<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;


Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('jobs', JobController::class);
    Route::get('/jobs', [JobController::class, 'index'])->withoutMiddleware(['auth:sanctum']);
    Route::get('/jobs/{job}', [JobController::class, 'show'])->withoutMiddleware(['auth:sanctum']);
});
