<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\postController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\likeUpdateController;

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
    Route::get('/follower', [profileController::class, 'follower'])->name('follower');
    Route::get('/following', [profileController::class, 'following'])->name('following');
    Route::post('/follow', [profileController::class, 'follow'])->name('follow');
    Route::post('/unfollow', [profileController::class, 'unfollow'])->name('unfollow');
    Route::post('/removefollower', [profileController::class, 'removefollower'])->name('removefollower');
    Route::get('/about', [profileController::class, 'about'])->name('about');

    Route::get('/setting', [settingController::class, 'setting'])->name('setting');
    Route::post('/poststatus', [postController::class, 'poststatus'])->name('poststatus');
    Route::post('/like', [likeUpdateController::class, 'like'])->name('like');
    Route::post('/dislike', [likeUpdateController::class, 'dislike'])->name('dislike');
    Route::post('/postcomment', [commentController::class, 'postComment'])->name('postComment');
    Route::post('/passwordreset', [settingController::class, 'passwordreset'])->name('passwordreset');

Route::get('/home', [HomeController::class, 'joinpostuser'])->name('home');

/*
for test case
*/
Route::get('/test', [HomeController::class, 'testview'])->name('test');