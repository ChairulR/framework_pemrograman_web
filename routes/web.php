<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return ' ini halaman about ';
});

Route::get('/user/{name?}', function ($name = 'Guest') {
    return 'Hello '.$name;
});

Route::get('/users/{id}', function ($id) {
    return 'ID Nigger: '.$id;
});

Route::get('/profile', function () {
    return 'Ini halaman profile';
});

Route::get('/redirect-to-profile', function (){
    return redirect()->route('profile');
});

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', function(){
        return 'Admin Dashboard';
    });
    Route::get('/', function () {
    return view('admin');
    });
});

Route::get('/contact', function(){
    return "Ini adalah halaman kontak";
}) ->name(name: 'contact');