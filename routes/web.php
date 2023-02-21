<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
Route::get('/proyectos', [ProjectController::class, 'index'])->name('project.index');

/* Cambiar estado de tareas */
Route::put('/tareas/estado/{task}', [TaskController::class, 'changeState'])->name('task.changeState');

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
 */