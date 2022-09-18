<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

Route::get('posts/byCategory/{category}', [PostController::class, 'postsByCategory'])->name('postsByCategory');

//Route::get('posts', [PostController::class, 'index']) -> name('allPosts');
//
//Route::get('posts/create', [PostController::class, 'create']) -> name('createPost');
