<?php 
 
$namespace = 'CategoryModule\Http\Controllers\api';

Route::group([
    'prefix'        => 'api',
    'namespace'     => $namespace,  
    'middleware'    => 'auth:api'
], function() {
    Route::resource('Categories', 'CategoryController')->only([
        'index', 'store', 'update', 'destory', 'show'
    ]);
});