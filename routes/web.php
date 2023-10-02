<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\postController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\commentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/profile', [profileController::class, 'profile'])->name('profile');
Route::get('/setting', [settingController::class, 'setting'])->name('setting');
Route::post('/poststatus', [postController::class, 'poststatus'])->name('poststatus');
Route::post('/postcomment', [commentController::class, 'postComment'])->name('postComment');



Route::get('/home', [HomeController::class, 'joinpostuser'])->name('home');


Route::get('/test', [HomeController::class, 'joinpostuser'])->name('test');