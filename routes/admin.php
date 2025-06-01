<?php

use App\Events\MessageSent;
use App\Events\PrivateNotificationEvent;
use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
Route::get('/about', [HomeController::class, 'about'])->name('admin.about');

// public notification
Route::get('/broadcast', function () {
    $message = 'This is the new message';
    broadcast(new MessageSent($message));
    return 'Message BroadCasted';
});

// private notification
Route::get('/broadcast_private', function () {
    $userId = 1;
    $message = 'This is the new private message';
    broadcast(new PrivateNotificationEvent($userId, $message));
    return 'Private Message BroadCasted';
});


Route::post('/user',[HomeController::class,'store'])->name('user.store');