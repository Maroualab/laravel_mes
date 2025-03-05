<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [AuthController::class, 'registerView']);
Route::get('/register', [AuthController::class, 'signUp'])->name('register');
Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login',[AuthController::class,'signIn'])->name('login');

