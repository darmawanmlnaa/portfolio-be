<?php

use App\Http\Controllers\Api\ExperienceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Experiences
Route::get('experiences', [ExperienceController::class, 'index']);
Route::get('experiences/{id}', [ExperienceController::class, 'show']);
Route::post('experiences', [ExperienceController::class, 'store']);
Route::put('experiences/{id}', [ExperienceController::class, 'update']);
Route::delete('experiences/{id}', [ExperienceController::class, 'delete']);