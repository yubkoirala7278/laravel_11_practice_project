<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
Route::resources(['users' => UserController::class,]);
