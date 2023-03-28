<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;


Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('jobs', JobController::class);
});
