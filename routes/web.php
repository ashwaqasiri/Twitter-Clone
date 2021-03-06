<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExploreController;
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
    return view('welcome');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/tweets', [\App\Http\Controllers\TweetsController::class,'index'])->name('home');
    Route::post('/profile/{user:name}/follow', [\App\Http\Controllers\FollowsController::class,'store']);
    Route::get('/profile/edit/{user:name}', [\App\Http\Controllers\ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile/update/{user:name}', [\App\Http\Controllers\ProfileController::class,'update'])->name('profile.update');
    Route::get('/explore',ExploreController::class)->name('explore');
    Route::post('/tweets/{tweet}/like', [\App\Http\Controllers\LikeController::class,'store'])->name('tweets.like');
    Route::post('/tweets/{tweet}/retweet', [\App\Http\Controllers\TweetsController::class,'retweet'])->name('tweets.retweet');
});

Route::get('/profile/{user:name}',[\App\Http\Controllers\ProfileController::class,'show'])->name('profile');

require __DIR__.'/auth.php';
