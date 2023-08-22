<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// moving from Resource to avoid  / as a bug
Route::get('/', [TaskController::class, 'index'])->name('index');

Route::get('/create', [TaskController::class, 'create'])->name('create');
Route::post('/store', [TaskController::class, 'store'])->name('store');

Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('edit');
Route::put('/{id}', [TaskController::class, 'update'])->name('update');

Route::delete('/{id}', [TaskController::class, 'destroy'])->name('destroy');

Auth::routes();
