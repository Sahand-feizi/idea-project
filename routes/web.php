<?php

declare(strict_types=1);

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StepController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/ideas');

Route::get('/ideas', [IdeaController::class, 'index'])
    ->name('idea.index')
    ->middleware('auth');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])
    ->middleware('auth')
    ->can('modify', 'idea');
Route::post('/ideas', [IdeaController::class, 'store'])
    ->middleware('auth');
Route::patch('/ideas/{idea}', [IdeaController::class, 'update'])
    ->middleware('auth')
    ->can('modify', 'idea');
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])
    ->name('idea.destroy')
    ->middleware('auth')
    ->can('modify', 'idea');

Route::patch('/steps/{step}/update', [StepController::class, 'update'])
    ->name('step.update')
    ->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])
    ->middleware('guest');
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');
Route::delete('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth');

// dashboard
Route::get('/profile/settings', [ProfileController::class, 'edit'])->middleware('auth');
Route::patch('/profile', [ProfileController::class, 'update'])->middleware('auth');
Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware('auth');
