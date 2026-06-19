<?php

declare(strict_types=1);

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StepController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/ideas');

Route::middleware('auth')->group(function () {
    Route::get('/ideas', [IdeaController::class, 'index'])
        ->name('idea.index');
    Route::get('/ideas/{idea}', [IdeaController::class, 'show'])
        ->can('modify', 'idea');
    Route::post('/ideas', [IdeaController::class, 'store']);
    Route::patch('/ideas/{idea}', [IdeaController::class, 'update'])
        ->can('modify', 'idea');
    Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])
        ->name('idea.destroy')
        ->can('modify', 'idea');

    Route::patch('/steps/{step}/update', [StepController::class, 'update'])
        ->name('step.update');

    // dashboard
    Route::get('/profile/settings', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);

    // logout
    Route::delete('/logout', [SessionController::class, 'destroy']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])
        ->name('login');
    Route::post('/login', [SessionController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
});
