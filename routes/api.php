<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IBGEController;
use App\Http\Controllers\PersonController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/states', [IBGEController::class, 'states']);
Route::get('/states/{uf}/cities', [IBGEController::class, 'cities']);
