<?php

// use Illuminate\Routing\Route;

$namespace = 'UserModule\Http\Controllers\api';

Route::group([
    'prefix'        => 'api/board',
    'namespace'     => $namespace, 
    'as'            => 'board'
], function() {
    Route::get('show/{show}', 'boardController@show');
});