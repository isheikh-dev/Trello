<?php

// use Illuminate\Routing\Route;

$namespace = 'UserModule\Http\Controllers\api';

Route::group([
    'prefix'        => 'api/',
    'namespace'     => $namespace, 
    'as'            => 'user'
], function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login'); 
    Route::post('logout', 'AuthController@logout'); 
});