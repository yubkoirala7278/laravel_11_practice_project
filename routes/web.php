<?php

use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication
Auth::routes([
    "verify" => true
]);

// Public
require __DIR__ . '/public.php';

// admin
Route::middleware(['auth.admin', 'verified'])->prefix('admin')->group(function () {
    require __DIR__ . '/admin.php';
});
