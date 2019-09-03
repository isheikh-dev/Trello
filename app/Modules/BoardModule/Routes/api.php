<?php

// use Illuminate\Routing\Route;

$namespace = 'BoardModule\Http\Controllers\api';

Route::group([
    'prefix'        => 'board',
    'namespace'     => $namespace, 
    'as'            => 'board'
], function() {
    Route::get('show', 'boardController@show');
});