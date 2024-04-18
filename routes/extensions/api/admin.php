<?php


use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminJobRequestController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::post('login', [AdminAuthController::class, 'login'])->name('login');


    // region authenticated
    Route::middleware('auth:admin')->group(function () {

        Route::group([
            'controller' => AdminJobRequestController::class,
            'as' => 'jobRequests.',
            'prefix' => 'job-requests'
        ], static function () {

            Route::get('/', [AdminJobRequestController::class, 'index'])->name('index');

        });

    });
    // endregion
});

