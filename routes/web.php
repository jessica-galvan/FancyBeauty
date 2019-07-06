<?php
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/laravel', function () {return view('welcome');}); /*Este es temporal, just in case*/

/*SECCION OTROS*/
Route::get('/', 'ProductoController@index');
Route::get('/index', 'ProductoController@index');
Route::get('/faq', function(){return view('faq');});
// Route::get('/categoria/{id}', 'ProductoController@filtro');
Route::get('/producto/{id}', 'ProductoController@show'); /*Detalle producto*/

/*SECCION CARRITOS*/
Route::get('/carrito', 'CarritoController@index')->middleware('auth');
Route::post('/addtocart', 'CarritoController@store')->middleware('auth');
// Route::post('/producto/{id}', 'CarritoController@store')->middleware('auth');
Route::get('/eliminar/{id}', 'CarritoController@destroy')->middleware('auth');
Route::get('/comprar/{{id}}', 'CarritoController@comprar')->middleware('auth');


/*PERFIL USUARIO*/
Route::get('/perfil', 'UsuarioController@show')->middleware('auth');
Route::get('/perfil/editar', 'UsuarioController@edit')->middleware('auth');
Route::post('/perfil/editar', 'UsuarioController@update')->middleware('auth');
Route::get('/perfil/password', 'UsuarioController@editPass')->middleware('auth');
Route::post('/perfil/password', 'UsuarioController@updatePass')->middleware('auth');

//SECCION ADMINS para agregar, editar y borrar productos
Route::get('/lista', 'ProductoController@indexEdit');
Route::get('/nuevo', 'ProductoController@create');
Route::post('/nuevo', 'ProductoController@store');
Route::get('/editar/{id}', 'ProductoController@edit');
Route::post('/editar/{id}', 'ProductoController@update');
Route::get('/borrar/{id}', 'ProductoController@showDestroy');
Route::post('/borrar', 'ProductoController@destroy');
Route::get('/confirmacion-borrado', function(){return view('confirmacion-borrado');});

/*SECCION LOGIN, RECUPERO Y REGISTER*/
Auth::routes();
Route::get('/confirmacion', function(){return view('confirmacion');})->middleware('guest');

Route::get('/recupero/email', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('/recupero/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/recupero', 'Auth\ResetPasswordController@showResetForm');
Route::post('/recupero', 'Auth\ResetPasswordController@reset');
/*Cuando te registras correctamente, te lleva a esta, no se si sirve o es necesaria luego*/
