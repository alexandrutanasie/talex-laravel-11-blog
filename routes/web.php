<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name("login");
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/{url}', [FrontendController::class, 'main'])->where('url', '[a-zA-Z0-9_-]+')->name('main');

Route::prefix('admin')->as('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/user/change-password',[UserController::class, 'changePassword'])->name('change.password');
    Route::put('/user/password/update', [UserController::class, 'updatePassword'])->name('password.update');

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostsController::class);
});