<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::get('/', function () {
    return view('welcome');
});
Route::resource("/student", StudentController::class);
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');