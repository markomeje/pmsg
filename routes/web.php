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


Route::middleware(['web'])->domain(env('APP_URL'))->group(function() {
    Route::get('/', function () {
        return view('frontend.home.index');
    })->name('home');

    Route::get('/support', function () {
        return view('frontend.support.index');
    })->name('support');

    Route::get('/login', function () {
        return view('frontend.auth.login');
    })->name('login');

    Route::get('/profile', function () {
        return view('frontend.home.profile');
    })->name('profile');

    Route::prefix('supporter')->group(function () {
        Route::post('/add', [\App\Http\Controllers\SupporterController::class, 'add'])->name('supporter.add');
    });

    Route::prefix('news')->group(function () {
        Route::get('/', [\App\Http\Controllers\NewsController::class, 'index'])->name('news');
        Route::post('/{id}/{slug}', [\App\Http\Controllers\NewsController::class, 'send'])->name('news.read');
    });
});

Route::middleware(['web', 'auth'])->domain(env('ADMIN_URL'))->group(function() {
    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');
});
