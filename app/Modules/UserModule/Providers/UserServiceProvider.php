<?php

namespace UserModule\Providers;

use Illuminate\Support\ServiceProvider;
use UserModule\Repositories\AuthRepositoryEloquent;
use UserModule\Repositories\AuthRepositoryInterface;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(AuthRepositoryInterface::class, AuthRepositoryEloquent::class); 
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       $ds = DIRECTORY_SEPARATOR;
       $this->loadMigrationsFrom(__DIR__.$ds. '..' .$ds. 'database' .$ds. 'migration');
       $this->loadRoutesFrom(__DIR__.$ds. '..' .$ds. 'Routes' .$ds. 'api.php');
       $this->loadRoutesFrom(__DIR__.$ds. '..' .$ds. 'Routes' .$ds. 'web.php');
    }
}
