<?php

namespace TaskModule\Providers;

use Illuminate\Support\ServiceProvider;
use TaskModule\Repositories\TaskRepositoryEloquent;
use TaskModule\Repositories\TaskRepositoryInterface;

class TaskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(TaskRepositoryInterface::class, TaskRepositoryEloquent::class); 
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
