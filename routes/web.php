<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/feed', [PostController::class, 'index']);

Route::get('/', function () {
    return "welcome to the home page";
});

Route::get('/hi', function (){
    return "hello bilal";
});

Route::get('/register' , [AuthController::class , 'showRegister'])->name('show.register');
Route::get('/login' , [AuthController::class , 'showLogin'])->name('show.login');
Route::post('/register' , [AuthController::class , 'Register'])->name('register');
Route::post('/login' , [AuthController::class , 'Login'])->name('login');


// Route::get('/feed', function (){
//     return view('feed');
// });
