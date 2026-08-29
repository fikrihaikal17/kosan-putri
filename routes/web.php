<?php

use App\Http\Controllers\AiAssistantController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Public Website Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kamar', [HomeController::class, 'rooms'])->name('rooms.index');
Route::get('/kamar/{slug}', [HomeController::class, 'roomDetail'])->name('rooms.detail');
Route::get('/fasilitas', [HomeController::class, 'facilities'])->name('facilities.index');
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery.index');
Route::get('/lokasi', [HomeController::class, 'location'])->name('location.index');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq.index');

// Search Engine Optimization (SEO) Endpoints
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('seo.sitemap');
Route::get('/robots.txt', [HomeController::class, 'robots'])->name('seo.robots');

// Grounded AI "Tanya Kost" Endpoint
Route::post('/api/tanya-kost', [AiAssistantController::class, 'ask'])->name('tanya-kost.ask');
