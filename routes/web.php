<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepostController;
use App\Http\Controllers\SavedPostController;

Route::middleware(['is_auth'])->group(function () {
    Route::get('/feed', [PostController::class, 'index'])->name('feed');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/createpost', [PostController::class, 'store'])->name('createpost');


    Route::get('/users/{user}', [ProfileController::class, "show"])->name('profile.show');
    Route::get('/profileEdit', [ProfileController::class, "edit"])->name('profileEdit');

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');



    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/SubmitComments/{post}', [CommentController::class, 'store'])->name('AddComment');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::post('/like/{post}', [LikeController::class, 'toggle'])->name('like');


    Route::post('/follow/{user}', [FollowController::class, 'store'])->name('follow.store');
    Route::delete('/follow/{user}', [FollowController::class, 'destroy'])->name('follow.destroy');

    Route::post('/posts/{post}/repost', [RepostController::class, 'store'])->name('repost.store');
    Route::delete('/posts/{post}/repost', [RepostController::class, 'destroy'])->name('repost.destroy');

    Route::get('/saved-items', [SavedPostController::class, 'index'])->name('saved-items.index');
    Route::post('/posts/{post}/save', [SavedPostController::class, 'store'])->name('saved-posts.store');
    Route::delete('/posts/{post}/save', [SavedPostController::class, 'destroy'])->name('saved-posts.destroy');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::post('/register', [AuthController::class, 'Register'])->name('register');
    Route::post('/login', [AuthController::class, 'Login'])->name('login');
});



// Route::get('/feed', function (){
//     return view('feed');
// });


