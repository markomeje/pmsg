<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::domain(env('APP_URL'))->group(function() {
    Route::get('/', function () {
        return view('frontend.home.index');
    })->name('home');

    Route::get('/support', function () {
        return view('frontend.support.index');
    })->name('support');

    Route::prefix('supporter')->group(function () {
        Route::post('/add', [\App\Http\Controllers\SupporterController::class, 'add'])->name('supporter.add');
    });

    Route::prefix('news')->group(function () {
        Route::post('/', [\App\Http\Controllers\NewsController::class, 'send'])->name('news');
    });
});
