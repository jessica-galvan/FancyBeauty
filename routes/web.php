<?php
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/laravel', function () {return view('welcome');}); /*Este es temporal, just in case*/

/*SECCION OTROS*/
Route::get('/', 'ProductoController@index');
Route::get('/index', 'ProductoController@index');
Route::get('/producto/{id}', 'ProductoController@show'); /*Detalle producto*/
Route::get('/faq', function(){return view('faq');});

/*PERFIL USUARIO*/
Route::get('/perfil', 'UsuarioController@index');
Route::get('/perfil/editar', 'UsuarioController@edit');
Route::post('/perfil/editar', 'UsuarioController@update');
Route::get('/perfil/password', 'UsuarioController@editPass');
Route::post('/perfil/password', 'UsuarioController@updatePass');

//SECCION ADMINS para agregar, editar y borrar productos
Route::get('/lista', 'ProductoController@indexEdit');
Route::get('/nuevo', 'ProductoController@create');
Route::post('/nuevo', 'ProductoController@store');
Route::get('/editar/{id}', 'ProductoController@edit');
Route::post('/editar/{id}', 'ProductoController@update');
Route::get('/borrar/{id}', 'ProductoController@showDestroy');
Route::post('/borrar/{id}', 'ProductoController@destroy');

/*SECCION LOGIN, RECUPERO Y REGISTER*/
Auth::routes();
Route::get('/confirmacion', function(){return view('confirmacion');}); /*Cuando te registras correctamente, te lleva a esta*/

//A BORRAR
Route::get('/register2', function(){return view('/auth/register-backup');});
Route::get('/login2', function(){return view('/auth/login-backup');});
