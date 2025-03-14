<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*Posts*/

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::resources(['posts' => PostController::class]);

Route::prefix('posts/{post}')->group(function () {

    /*Comments*/
    Route::post('/comments', [CommentController::class, 'store'])->name('posts.comments.store')->middleware('auth');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('posts.comments.destroy');

    /*Likes*/
    Route::post('/likes', [LikingController::class, 'store'])->name('posts.like')->middleware('auth');
    Route::delete('/likes', [LikingController::class, 'destroy'])->name('posts.unlike')->middleware('auth');
});


/*Users*/
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users/{user}/follow', [UserController::class, 'follow'])->name('users.follow');
Route::delete('/users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
