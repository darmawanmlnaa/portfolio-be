<?php

use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('experiences', [ExperienceController::class, 'index']);
Route::get('experiences/{id}', [ExperienceController::class, 'show']);
Route::post('experiences', [ExperienceController::class, 'store']);
Route::put('experiences/{id}', [ExperienceController::class, 'update']);
Route::delete('experiences/{id}', [ExperienceController::class, 'delete']);