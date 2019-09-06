<?php 
 
$namespace = 'BoardModule\Http\Controllers\api';

Route::group([
    'prefix'        => 'api',
    'namespace'     => $namespace,  
    'middleware'    => 'auth:api'
], function() {
    Route::resource('boards', 'BoardController')->only([
        'create', 'store', 'update', 'destroy', 'index'
    ]);
});