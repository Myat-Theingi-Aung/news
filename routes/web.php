<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ChangePasswordController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\auth\ResetPasswordController;

Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/profile/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/news/show/{news}', [NewsController::class, 'show'])->name('news.show');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
    Route::get('/forgot', [ForgotPasswordController::class, 'show'])->name('forgot');
    Route::post('/forgot', [ForgotPasswordController::class, 'forgot'])->name('forgot.send');
    Route::get('/reset/{user}/{token}', [ResetPasswordController::class, 'show'])->name('reset');
    Route::put('/reset/{user}', [ResetPasswordController::class, 'reset'])->name('reset.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/profile/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/change/password/{user}', [ChangePasswordController::class, 'show'])->name('change.password');
    Route::put('/change/password{user}', [ChangePasswordController::class, 'update'])->name('update.password');

    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/create', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/update/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/destroy/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::fallback(function () {
    return redirect('/');
});


