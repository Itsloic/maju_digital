<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ArtikelController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/artikel', [ArtikelController::class, 'index']);
    Route::delete('/artikel/{artikel:id_artikel}', [ArtikelController::class, 'destroy']);
});