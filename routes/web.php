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
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/support', [\App\Http\Controllers\HomeController::class, 'support'])->name('support');
    Route::get('/profile', [\App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

    Route::prefix('supporter')->group(function () {
        Route::post('/add', [\App\Http\Controllers\SupporterController::class, 'add'])->name('supporter.add');
    });

    Route::prefix('news')->group(function () {
        Route::get('/', [\App\Http\Controllers\NewsController::class, 'index'])->name('news');
        Route::post('/{id}/{slug}', [\App\Http\Controllers\NewsController::class, 'send'])->name('news.read');
    });

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
        Route::post('/auth', [\App\Http\Controllers\LoginController::class, 'auth'])->name('auth.login');
        Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    });
});    

// Route::domain(env('ADMIN_URL'))->group(function() {
//     Route::middleware(['web', 'auth'])->group(function() {
//         Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
//     });
// });

