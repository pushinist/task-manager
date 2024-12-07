<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/completed', [TaskController::class, 'showCompleted'])->name('tasks.completed');
Route::get('/tasks/notcompleted', [TaskController::class, 'showNotCompleted'])->name('tasks.notcompleted');
Route::get('/tasks/deleted', [TaskController::class, 'showDeleted'])->name('tasks.deleted');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks/{task}/restore', [TaskController::class, 'restore'])->name('tasks.restore');
Route::post('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

