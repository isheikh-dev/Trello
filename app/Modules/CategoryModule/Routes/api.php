<?php 
 
$namespace = 'CategoryModule\Http\Controllers\api';

Route::group([
    'prefix'        => 'api',
    'namespace'     => $namespace,  
    'middleware'    => 'auth:api'
], function() {
    Route::resource('categories', 'CategoryController')->only([
        'store', 'update', 'destroy', 'index', 'show'
    ]);
});