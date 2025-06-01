<?php

use App\Http\Controllers\public\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::post('/contact_us',[HomeController::class,'contactForm'])->name('contact.form');