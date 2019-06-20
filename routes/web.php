<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', function(){
    return view('index');
});

Route::get('/index', function(){
    return view('index');
});

Route::get('/faq', function(){
    return view('faq');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/register', function(){
    return view('register');
});

Route::get('/confirmacion', function(){
    return view('confirmacion');
});

Route::get('/recupero', function(){
    return view('recupero');
});
