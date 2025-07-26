<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/contact', function () {
    return view('kontak');
})->name('contact');

Route::get('/visi', function () {
    return view('visi');
})->name('visi');

Route::get('/struktur', function () {
    return view('struktur');
})->name('struktur');

Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');
