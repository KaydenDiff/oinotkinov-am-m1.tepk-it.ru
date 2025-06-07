<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/models', [ModelsController::class, 'index'])->name('models.index');
Route::get('/models/create', [ModelsController::class, 'create'])->name('models.create');
Route::post('/models/create', [ModelsController::class, 'store'])->name('models.store');
Route::get('/models/edit/{model}', [ModelsController::class, 'edit']);
Route::get('/models/history/{model}', [ModelsController::class, 'history'])->name('models.history');
Route::post('/models/edit/{model}', [ModelsController::class, 'update'])->name('models.update');
Route::get('/models/delete/{model}', [ModelsController::class, 'destroy']);
