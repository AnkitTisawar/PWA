<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/profile/{id}', [UserController::class, 'show'])->name('profiles.show');
Route::get('/user/{id}/qr', [UserController::class, 'qr'])->name('users.qr');
Route::get('/scan', [UserController::class, 'scanPage'])->name('scan.page');
