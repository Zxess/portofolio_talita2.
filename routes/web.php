<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsAppController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/projects/{project}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/album', [AlbumController::class, 'index'])->name('album.index');

// Contact form -> send via WhatsApp (requires Twilio or WhatsApp Business API)
Route::post('/contact', [WhatsAppController::class, 'send'])->name('contact.send');
