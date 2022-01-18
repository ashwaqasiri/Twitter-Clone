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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/tweets', [\App\Http\Controllers\TweetsController::class,'index'])->name('home');
    Route::post('/tweets', [\App\Http\Controllers\TweetsController::class,'store']);
    Route::post('/profile/{user:name}/follow', [\App\Http\Controllers\FollowsController::class,'store']);
    Route::get('/profile/edit/{user:name}', [\App\Http\Controllers\ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile/update/{user:name}', [\App\Http\Controllers\ProfileController::class,'update'])->name('profile.update');
});

Route::get('/profile/{user:name}',[\App\Http\Controllers\ProfileController::class,'show'])->name('profile');

require __DIR__.'/auth.php';
