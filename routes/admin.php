<?php

use App\Events\MessageSent;
use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
Route::get('/about', [HomeController::class, 'about'])->name('admin.about');

Route::get('/broadcast', function () {
    $message = 'This is the new message';
    broadcast(new MessageSent($message));
    return 'Message BroadCasted';
});
