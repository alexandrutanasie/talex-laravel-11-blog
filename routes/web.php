<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name("login");
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->as('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/user/change-password',[UserController::class, 'changePassword'])->name('change.password');
    Route::put('/user/password/update', [UserController::class, 'updatePassword'])->name('password.update');

    Route::get('/categories/list',[AdminController::class, 'categories'])->name('categories.list');
});