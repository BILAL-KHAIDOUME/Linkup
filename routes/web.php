<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "welcome to the home page";
});

Route::get('/hi', function (){
    return "hello bilal";
});

Route::get('/feed', function (){
    return view('feed');
});
