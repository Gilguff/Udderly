<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/posts', [PostController::class, 'index'])->name('posts.index');*/
/*Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');*/
/*Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');*/
/*Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');*/
/*Route::put('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');*/
/*Route::delete('/posts/destroy/{post}', [PostController::class, 'destroy'])->name('posts.destroy');*/

Route::resources(['posts' => PostController::class]);

Route::prefix('posts/{post}')->group(function () {
    Route::post('/', [CommentController::class, 'store'])->name('posts.comments.store')->middleware('auth');
    Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('posts.comments.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
