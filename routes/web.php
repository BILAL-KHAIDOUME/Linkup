<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/feed', [PostController::class, 'index']);

Route::get('/', function () {
    return "welcome to the home page";
});

Route::get('/hi', function (){
    return "hello bilal";
});

// Route::get('/feed', function (){
//     return view('feed');
// });
