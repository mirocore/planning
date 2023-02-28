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

/* PROYECTOS */
Route::get('/proyectos', [ProjectController::class, 'index'])->name('project.index');
Route::get('/proyectos/create', [ProjectController::class, 'create'])->name('project.create');
Route::post('/proyectos', [ProjectController::class, 'store'])->name('project.store');
Route::delete('/proyectos/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
Route::get('/proyectos/edit/{project}', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/proyectos/{project}', [ProjectController::class, 'update'])->name('project.update');

/* TAREAS */
Route::post('/tareas', [TaskController::class, 'store'])->name('task.store');
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