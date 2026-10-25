<?php

use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArtikelController::class, 'beranda'])->name('beranda');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{artikel}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::get('/data', [App\Http\Controllers\DataController::class, 'index'])->name('data.index');

// Portal Beranda Lama
Route::get('/portal', function () {
    return view('portal');
})->name('portal');

