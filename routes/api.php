<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ExperienceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum', 'IsAdmin')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::get('/projects/{project}', [ProjectController::class, 'show']);
    Route::put('/projects/{project}', [ProjectController::class, 'update']);
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/experiences', [ExperienceController::class, 'index']);
    Route::post('/experiences', [ExperienceController::class, 'store']);
    Route::get('/experiences/{id}', [ExperienceController::class, 'show']);
    Route::put('/experiences/{id}', [ExperienceController::class, 'update']);
    Route::delete('/experiences/{id}', [ExperienceController::class, 'destroy']);
});
