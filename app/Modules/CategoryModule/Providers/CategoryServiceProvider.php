<?php

namespace CategoryModule\Providers;

use Illuminate\Support\ServiceProvider;
use CategoryModule\Repositories\CategoryRepositoryEloquent;
use CategoryModule\Repositories\CategoryRepositoryInterface;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(CategoryRepositoryInterface::class, CategoryRepositoryEloquent::class); 
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
