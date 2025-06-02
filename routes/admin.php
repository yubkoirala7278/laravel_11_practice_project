<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

Route::delete('/role/bulk-delete', [RoleController::class, 'bulkDestroy'])->name('admin.role.bulk-destroy');
Route::get('/role', [RoleController::class, 'index'])->name('admin.role');
Route::post('/role', [RoleController::class, 'store'])->name('admin.role.store');
Route::get('/role/{role}', [RoleController::class, 'show'])->name('admin.role.show');
Route::put('/role/{role}', [RoleController::class, 'update'])->name('admin.role.update');
Route::delete('/role/{role}', [RoleController::class, 'destroy'])->name('admin.role.destroy');


Route::delete('users/bulk-delete', [UserController::class, 'bulkDestroy'])->name('users.bulk-destroy');
Route::post('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
Route::resources(['users' => UserController::class,]);
