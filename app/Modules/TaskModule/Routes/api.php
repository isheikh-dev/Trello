<?php 
 
$namespace = 'TaskModule\Http\Controllers\api';

Route::group([
    'prefix'        => 'api',
    'namespace'     => $namespace,  
    'middleware'    => 'auth:api'
], function() {
    Route::resource('tasks', 'TaskController')->only([
         'store', 'update', 'destroy', 'index', 'show'
    ]);
});