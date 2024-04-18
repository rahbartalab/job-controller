<?php

use App\Http\Controllers\Applicant\ApplicantAuthController;
use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Applicant\ApplicantJobRequestController;
use App\Http\Middleware\Custom\Applicant\CanSendResume;
use Illuminate\Support\Facades\Route;

Route::prefix('applicant')->name('applicant.')->group(function () {
    Route::post('login', [ApplicantAuthController::class, 'login'])->name('login');


    // region authenticated

    Route::middleware('auth:applicant')->group(function () {
        Route::group([
            'as' => 'profile.',
            'controller' => ApplicantController::class,
            'prefix' => 'profile'
        ], static function () {

            Route::get('/', 'showProfile')->name('show');
            Route::put('/', 'updateProfile')->name('update');

        });


        Route::group([
            'as' => 'jobRequests.',
            'controller' => ApplicantJobRequestController::class,
            'prefix' => 'job-requests',
        ], static function () {

            Route::post('send', 'send')->name('send')->middleware([
                CanSendResume::class
            ]);

        });

    });

    // endregion
});
