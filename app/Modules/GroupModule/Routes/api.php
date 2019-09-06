<?php 
 
$namespace = 'GroupModule\Http\Controllers\api';

Route::group([
    'prefix'        => 'api',
    'namespace'     => $namespace,  
    'middleware'    => 'auth:api'
], function() {
    Route::resource('groups', 'GroupController')->only([
         'store', 'update', 'destroy', 'index', 'show'
    ]);
});