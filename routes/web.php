<?php

Route::get('/', function () {
    return 'home';
});

Route::get('/usuarios', 'UserController@index')
    ->name('users');

Route::get('/usuarios/{id}', 'UserController@show')
    ->where('id', '\d+')
    ->name('users.show');

Route::get('/usuarios/nuevo', 'UserController@create')
    ->name('users.create');;

Route::get('saludo/{name}/{nickname}', 'WelcomeUserController@with_nickname')
->name('users.welcome');;

Route::get('saludo/{name}', 'WelcomeUserController@saludo');

Route::get('usuarios/{id}/edit', 'UserController@edit')
      ->where('id', '\d+');
