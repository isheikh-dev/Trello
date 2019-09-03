<?php

// use Illuminate\Routing\Route;

$namespace = 'UserModule\Http\Controllers\api';

Route::group([
    'prefix'        => 'api/user',
    'namespace'     => $namespace, 
    'as'            => 'user'
], function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
});