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

Route::get('/', function () {
    return view('frontend.home.index');
});

// Route::prefix('supporter')->group(function () {
//     Route::post('/send', [\App\Http\Controllers\SupporterController::class, 'send'])->name('support.add');
//     Route::get('/thanks', [\App\Http\Controllers\SupporterController::class, 'thanks'])->name('contact.thanks');
// });
