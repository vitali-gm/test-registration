<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('user-list');
});

Route::get('user-registration', [UserController::class, 'registration'])
    ->name('user-registration');

Route::get('user-list', [UserController::class, 'list'])
    ->name('user-list');

Route::post('user-create', [UserController::class, 'store'])
    ->name('user-create');

Route::get('user-activation/{token}', [UserController::class, 'activated'])
    ->name('user-activation');

Route::get('send', [UserController::class, 'send'])
    ->name('send');
