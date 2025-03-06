<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('home');})->middleware([CheckRole::class]);

Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class,'signUp'])->name('register');

Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login',[AuthController::class,'signIn'])->name('login');

