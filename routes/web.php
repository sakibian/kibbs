<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\ContactController;

Route::group(['middleware' => 'guest'], function() {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact/send', [ContactController::class, 'store'])->name('contact-email');
});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group([
       'prefix' => 'user',
       'as' => 'user.'
    ], function(){
        Route::resource('notice', \App\Http\Controllers\User\NoticeController::class);
        Route::get('bookings',
         [\App\Http\Controllers\User\BookingController::class, 'index'])
         ->name('bookings.index');

        Route::get('bookings/start',
        [\App\Http\Controllers\User\BookingController::class, 'create'])
        ->name('bookings.create');

        Route::post('bookings',
        [\App\Http\Controllers\User\BookingController::class, 'store'])
        ->name('bookings.store');
        
        Route::get('bookings/times',
        [\App\Http\Controllers\User\BookingController::class, 'bookingTimes'])
        ->name('bookings.times');
    });

    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.'
     ], function(){
        Route::get('bookings',
        [\App\Http\Controllers\Admin\BookingController::class, 'index'])
        ->name('bookings.index');

        Route::delete('bookings/{id}',
        [\App\Http\Controllers\Admin\BookingController::class, 'destroy'])
        ->name('bookings.destroy');
     });
});
