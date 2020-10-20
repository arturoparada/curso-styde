<?php

Route::get('/', function () {
    return 'homerun';
});

Route::get('/usuarios', 'UserController@index');

Route::get('/usuarios/{id}', 'UserController@show')
    ->where('id', '\d+');

Route::get('/usuarios/nuevo', 'UserController@create');

Route::get('saludo/{name}/{nickname}', 'WelcomeUserController@with_nickname');

Route::get('saludo/{name}', 'WelcomeUserController@saludo');

Route::get('usuarios/{id}/edit', 'UserController@edit')
      ->where('id', '\d+');
