<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Task\Create;
use App\Livewire\TaskDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/new-register', function () {
    return view('auth.register');
})->name('register.view');

Route::post('/new-register', [AuthController::class, 'register'])->name('register');


Route::get('/new-login', function () {
    return view('auth.login');
})->name('login.view');

Route::post('/new-login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', TaskDashboard::class)
    ->middleware('auth') 
    ->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

Route::get('/task/create', Create::class)
    ->middleware('auth')
    ->name('task.create');

Route::get('/task/edit/{editTask}', Create::class)
    ->middleware('auth')
    ->name('task.edit');


