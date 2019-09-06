<?php

namespace GroupModule\Providers;

use Illuminate\Support\ServiceProvider;
use GroupModule\Repositories\GroupRepositoryEloquent;
use GroupModule\Repositories\GroupRepositoryInterface;

class GroupServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(GroupRepositoryInterface::class, GroupRepositoryEloquent::class); 
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
    }
}
