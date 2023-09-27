<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/a', [\App\Http\Controllers\AvatarController::class, 'show'])
    ->name('avatar.show');

Route::get('/avatar', [\App\Http\Controllers\AvatarController::class, 'index'])
    ->middleware('auth')
    ->name('avatar.index');

Route::get('/avatar/{avatar}', [\App\Http\Controllers\AvatarController::class, 'showid'])
    ->middleware('auth')
    ->name('avatar.showid');

Route::get('/avatar/create', [\App\Http\Controllers\AvatarController::class, 'create'])
    ->middleware('auth')
    ->name('avatar.create');

Route::post('/avatar', [\App\Http\Controllers\AvatarController::class, 'store'])
    ->name('avatar.store');

Route::get('/login', [\App\Http\Controllers\SessionController::class, 'create'])
    ->name('login');

Route::post('/login', [\App\Http\Controllers\SessionController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [\App\Http\Controllers\SessionController::class, 'destroy'])
    ->name('logout');
