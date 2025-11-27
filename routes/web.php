<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiProjectController;
use App\Http\Controllers\AiTextGenerationController;

Route::get('/', function () {
    return redirect()->route('ai-projects.index');
});

Route::resource('ai-projects', AiProjectController::class);

Route::resource('ai-projects', AiProjectController::class);

Route::post('/ai-text-generations', [AiTextGenerationController::class, 'store'])
    ->name('ai-text-generations.store');
