<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::middleware(['auth'])->group(function () {
    /*Posts*/
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::resources(['posts' => PostController::class]);
    Route::get('/following-posts', [PostController::class, 'followingPosts'])->name('posts.following');

    Route::prefix('posts/{post}')->group(function () {

        /*Comments*/
        Route::post('/comments', [CommentController::class, 'store'])->name('posts.comments.store');
        Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('posts.comments.destroy');

        /*Likes*/
        Route::post('/likes', [LikingController::class, 'store'])->name('posts.like');
        Route::delete('/likes', [LikingController::class, 'destroy'])->name('posts.unlike');
    });


    /*Users*/
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/follow', [UserController::class, 'follow'])->name('users.follow');
    Route::delete('/users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');


    Route::prefix('users/{user}')->group(function () {

        /*Profiles*/
        Route::get('/profile', [ProfileController::class, 'show'])->name('profiles.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profiles.update');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
