<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('people')->group(function () {
    Route::get('/', [PersonController::class, 'index'])->name('people.index');
    Route::get('/create', [PersonController::class, 'create'])->name('people.create');
    Route::post('/store', [PersonController::class, 'store'])->name('people.store');
    Route::get('/{id}/edit', [PersonController::class, 'edit'])->name('people.edit');
    Route::get('/{id}/show', [PersonController::class, 'show'])->name('people.show');
    Route::put('/{id}/update', [PersonController::class, 'update'])->name('people.update');
    Route::delete('/{id}/deletar', [PersonController::class, 'destroy'])->name('people.delete');
});
