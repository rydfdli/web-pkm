<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\VisiController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/news', [BeritaController::class, 'index'])->name('news');

// Tambahkan route untuk detail berita
Route::get('/news/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');


Route::get('/contact', [KontakController::class, 'index'])->name('contact');

Route::get('/visi', [VisiController::class, 'index'])->name('visi');

Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur');

Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');