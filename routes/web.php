<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ArtikelManageController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArtikelController::class, 'beranda'])->name('beranda');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{artikel}', [ArtikelController::class, 'show'])->name('artikel.show');

// Portal Beranda Lama
Route::get('/portal', function () {
    return view('portal');
})->name('portal');

// Tabel Data - Protected
Route::middleware(['auth', 'verified', 'can:lihat-tabel-data'])->group(function () {
    Route::get('/data', [App\Http\Controllers\DataController::class, 'index'])->name('data.index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profil/keamanan', function () {
        return view('profil.keamanan');
    })->name('profil.keamanan');

    Route::put('/user/password', function () {
        return back()->with('status', 'Kata sandi berhasil diperbarui.');
    })->middleware('password.confirm')->name('user.password.update');
});

// CRUD Artikel (Kelola)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/kelola/artikel', [ArtikelManageController::class, 'index'])->name('kelola.artikel.index');
    Route::get('/kelola/artikel/create', [ArtikelManageController::class, 'create'])->name('kelola.artikel.create')->middleware('can:tambah-artikel');
    Route::post('/kelola/artikel', [ArtikelManageController::class, 'store'])->name('kelola.artikel.store')->middleware('can:tambah-artikel');
    Route::get('/kelola/artikel/{artikel}/edit', [ArtikelManageController::class, 'edit'])->name('kelola.artikel.edit')->middleware('can:ubah-artikel,artikel');
    Route::put('/kelola/artikel/{artikel}', [ArtikelManageController::class, 'update'])->name('kelola.artikel.update')->middleware('can:ubah-artikel,artikel');
    Route::delete('/kelola/artikel/{artikel}', [ArtikelManageController::class, 'destroy'])->name('kelola.artikel.destroy')->middleware('can:hapus-artikel,artikel', 'password.confirm');
});

// Admin User Management
Route::middleware(['auth', 'verified', 'can:kelola-user', '2fa.admin', 'password.confirm'])->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

