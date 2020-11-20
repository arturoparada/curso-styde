<?php

Route::get('/', 'WelcomeUserController@home')
    ->name('welcome');

Route::get('/usuarios', 'UserController@index')
    ->name('users.index');

Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '\d+')
    ->name('users.show');

Route::get('/usuarios/nuevo', 'UserController@create')
    ->name('users.create');

Route::post('/usuarios', 'UserController@store');

Route::get('/saludo/{name}/{nickname}', 'WelcomeUserController@with_nickname')
->name('users.welcome');

Route::get('/saludo/{name}', 'WelcomeUserController@saludo');

Route::get('/usuarios/{user}/edit', 'UserController@edit')
      ->where('id', '\d+')
      ->name('users.edit');

Route::put('/usuarios/{user}', 'UserController@update');

Route::delete('/usuarios/{user}', 'UserController@destroy')
        ->name('users.destroy');

Route::get('/venta', 'SalesController@venta')
        ->name('sales.new');
