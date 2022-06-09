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

Route::get('/admin', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

// Route::domain(env('ADMIN_URL'))->middleware(['web', 'auth'])->group(function() {
//     Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

//     Route::prefix('news')->group(function () {
//         Route::get('/', [\App\Http\Controllers\Admin\NewsController::class, 'index'])->name('admin.news');

//         Route::match(['get', 'post'], '/add', [\App\Http\Controllers\Admin\NewsController::class, 'add'])->name('admin.news.add');
//         Route::post('/status/{id}', [\App\Http\Controllers\Admin\NewsController::class, 'status'])->name('admin.news.status.update');
//         Route::post('/delete/{id}', [\App\Http\Controllers\Admin\NewsController::class, 'delete'])->name('admin.news.delete');

//         Route::post('/edit/{id}', [\App\Http\Controllers\Admin\NewsController::class, 'edit'])->name('admin.news.edit');
//         Route::get('/edit/{id}', [\App\Http\Controllers\Admin\NewsController::class, 'edit'])->name('admin.news.edit');
        
//         Route::get('/{category?}', [\App\Http\Controllers\Admin\NewsController::class, 'index'])->name('admin.blogs');
//     });

//     Route::prefix('supporters')->group(function () {
//         Route::get('/', [\App\Http\Controllers\Admin\NewsController::class, 'index'])->name('admin.supporters');
//     });

//     Route::prefix('blogs')->group(function () {
//         Route::get('/', [\App\Http\Controllers\Admin\NewsController::class, 'index'])->name('admin.blogs');


//     });

//     Route::prefix('image')->group(function () {
//         Route::post('/upload', [\App\Http\Controllers\Api\ImagesController::class, 'upload'])->name('admin.image.upload');
//         Route::match(['delete', 'post'], '/delete', [\App\Http\Controllers\Api\ImagesController::class, 'delete'])->name('admin.image.delete');
//     });
// });

