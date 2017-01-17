<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
| POST, GET, PUT, DELETE
*/

Route::get('/','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');
Route::get('admin','FrontController@admin');
Route::resource('mail','MailController');

/*Reseteo de contraseñas*/
/*Muestra una vista en la que podemos ingresar correo para resetear contraseña*/
Route::get('password/email','Auth\PasswordController@getEmail');
Route::post('password/email','Auth\PasswordController@postEmail');

/*Pasamos el parámetro necesario, que es el token de la cuenta a la que
se le cambiará el password*/
Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');

Route::resource('usuario','UsuarioController');
Route::resource('genero','GeneroController');
/*Ruta necesaria para listar correctamente los géneros mediante ajax*/
Route::get('generos','GeneroController@listing');

Route::resource('pelicula','MovieController');

Route::resource('log','LogController');
Route::get('logout', 'LogController@logout');