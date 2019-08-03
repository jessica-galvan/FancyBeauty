<?php
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/laravel', function () {return view('welcome');}); /*Este es temporal, just in case*/

/*SECCION OTROS*/
Route::get('/', 'ProductoController@index');
Route::get('/index', 'ProductoController@index');
Route::get('/faq', 'HomeController@faq');
Route::get('/categoria/{id}/{palabra}', 'ProductoController@categoria');
Route::get('/buscar/{palabra}', 'ProductoController@buscador');
Route::get('/producto/{id}', 'ProductoController@show'); /*Detalle producto*/
Route::get('/productos', 'ProductoController@todos');

/*SECCION CARRITOS*/
Route::get('/carrito', 'CarritoController@index')->middleware('auth');
Route::post('/addtocart', 'CarritoController@store')->middleware('auth');
// Route::post('/producto/{id}', 'CarritoController@store')->middleware('auth');
Route::get('/eliminar/{id}', 'CarritoController@destroy')->middleware('auth');
Route::get('/comprar/{{id}}', 'CarritoController@comprar')->middleware('auth');
Route::post('/closecart', 'CarritoController@closecart')->middleware('auth');
Route::get('/felicitaciones', 'HomeController@congrats')->middleware('auth');
Route::get('/historial', 'CarritoController@historial')->middleware('auth');


/*PERFIL USUARIO*/
Route::get('/perfil', 'UsuarioController@show')->middleware('auth');
Route::get('/perfil/editar', 'UsuarioController@edit')->middleware('auth');
Route::post('/perfil/editar', 'UsuarioController@update')->middleware('auth');
// Route::get('/perfil/password', 'UsuarioController@editPass')->middleware('auth');
// Route::post('/perfil/password', 'UsuarioController@updatePass')->middleware('auth');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->middleware('auth');

//SECCION ADMINS para agregar, editar y borrar productos
Route::get('/lista', 'ProductoController@indexEdit')->middleware('auth');
Route::get('/nuevo', 'ProductoController@create')->middleware('auth');
Route::post('/nuevo', 'ProductoController@store')->middleware('auth');
Route::get('/editar/{id}', 'ProductoController@edit')->middleware('auth');
Route::post('/editar/{id}', 'ProductoController@update')->middleware('auth');
Route::get('/borrar/{id}', 'ProductoController@showDestroy')->middleware('auth');
Route::post('/borrar', 'ProductoController@destroy')->middleware('auth');
Route::get('/borrado', 'ProductoController@borrado')->middleware('auth');

/*SECCION LOGIN, RECUPERO Y REGISTER*/
Auth::routes();
Route::get('/confirmacion', function(){return view('confirmacion');})->middleware('guest'); //Creo que este quedo innecesario, porque Laravel loguea y te manda directo al index, cuando te registras. No te pide que te loguees una vez ya registrada.

Route::get('/recupero/email', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('/recupero/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/recupero', 'Auth\ResetPasswordController@showResetForm');
Route::post('/recupero', 'Auth\ResetPasswordController@reset');
