<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::middleware(['is_auth'])->group(function () {
    Route::get('/feed', [PostController::class, 'index'])->name('feed');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/createpost', [PostController::class, 'store'])->name('createpost');


    Route::get('/profile', [ProfileController::class, "show"])->name('profile');
    Route::get('/profileEdit', [ProfileController::class, "edit"])->name('profileEdit');

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    


    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
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
