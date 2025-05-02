<?php

use Illuminate\Support\Facades\Route;

// Beranda
Route::get('/', function () {
    return view('home');
})->name('beranda');

// Layanan dan submenu
Route::prefix('layanan')->group(function () {
    Route::get('/', function () {
        return view('layanan.index');
    })->name('layanan');
    
    Route::get('/website-development', function () {
        return view('layanan.website-development');
    })->name('layanan.website');
    
    Route::get('/mobile-app-development', function () {
        return view('layanan.mobile-app-development');
    })->name('layanan.mobile');
    
    Route::get('/ui-ux-brand-design', function () {
        return view('layanan.ui-ux-brand-design');
    })->name('layanan.uiux');
    
    Route::get('/seo', function () {
        return view('layanan.seo');
    })->name('layanan.seo');
    
    Route::get('/sosial-media-ads', function () {
        return view('layanan.sosial-media-ads');
    })->name('layanan.ads');
});

// Portfolio
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

// Tentang Kami
Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

// Karir
Route::get('/karir', function () {
    return view('karir');
})->name('karir');

// Blog
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// Halaman konsultasi
Route::get('/konsultasi', function () {
    return view('konsultasi');
})->name('konsultasi');