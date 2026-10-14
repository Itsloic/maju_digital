
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
})->name('beranda');

use App\Http\Controllers\ArticleController;

Route::get('/berita', [ArticleController::class, 'index'])
    ->name('berita.index');
Route::get('/berita/{slug}', [
    \App\Http\Controllers\ArticleController::class,
    'show'
])->name('berita.show');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource(
        'artikel',
        \App\Http\Controllers\ArticleAdminController::class
    )->except(['show']);
});
