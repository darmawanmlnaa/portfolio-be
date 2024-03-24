<?php

use App\Http\Controllers\Web\ExperienceController;
use App\Http\Controllers\Web\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Experiences
Route::get('experiences', [ExperienceController::class, 'index']);
Route::get('experiences/{id}', [ExperienceController::class, 'show']);
Route::post('experiences', [ExperienceController::class, 'store']);
Route::put('experiences/{id}', [ExperienceController::class, 'update']);
Route::delete('experiences/{id}', [ExperienceController::class, 'delete']);

// Projects
Route::get('projects', [ProjectController::class, 'index']);
Route::get('projects/{id}', [ProjectController::class, 'show']);
Route::post('projects', [ProjectController::class, 'store']);
Route::put('projects/{id}', [ProjectController::class, 'update']);
Route::delete('projects/{id}', [ProjectController::class, 'delete']);