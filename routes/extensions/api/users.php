<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'users.',
    'controller' => UserController::class,
    'prefix' => 'users',
    'middleware' => 'auth:sanctum'
], static function () {

    Route::get('show', 'show');

});
