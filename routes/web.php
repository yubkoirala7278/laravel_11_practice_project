<?php

use App\Http\Controllers\EsewaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication
Auth::routes([
    "verify" => true
]);

// Public
require __DIR__ . '/public.php';

// admin
Route::prefix('admin')->group(function () {
    require __DIR__ . '/admin.php';
});

Route::post('/esewaPay', [EsewaController::class, 'esewaPay'])->name('esewa');
Route::get('/success', [EsewaController::class, 'esewaPaySuccess']);
Route::get('/failure', [EsewaController::class, 'esewaPayFailed']);
