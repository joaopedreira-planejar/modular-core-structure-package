<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\GetUserController;

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/doly', GetUserController::class)->name('index');
});
