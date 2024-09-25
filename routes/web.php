<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Auth::routes();




Route::middleware(['auth'])->group(function () {
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/emi_details', 'emi_details')->name('emi_details');
    Route::get('/process_data', 'process_data')->name('process_data');
})->middleware('auth');
});
