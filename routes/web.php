<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () { // دى اسمها closure function or callback function
    return view('welcome');
});

// ----------- All Static Routes First, Then All Dynamic Routes ------------ //



// 1] all Posts List                                      // route name
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// 1- Define a new route so the user can access it through browser
// 2- Define Controller that render a view
// 3- Define View that contains posts
// 4- Delete static data from view

// 3] Create Post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// 1- Define a new route so the user can access it through browser
// 2- Define View that create post form

// 4] Store Post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// 2] show Single Post
// {post} => URL Parameter (mean that its dynamic to get)     // route name
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// 1- Define a new route so the user can access it through browser
// 2- Define View that contains posts
// 3- Delete static data from view

// 5] Edit Post
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// 1- Define a new route so the user can access it through browser
// 3- Define View that contains the post to Edit
// 4- Delete static data from view

Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');

// 6] Delete Post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


// 1- structure change for database (create table, edit column, remove column)
// 2- operations on database (INSERT record, EDIT record, DELETE record)