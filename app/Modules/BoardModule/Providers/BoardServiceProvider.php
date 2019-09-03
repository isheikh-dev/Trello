<?php

namespace BoardModule\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BoardRepositoryEloquent;
use App\Repositories\BoardRepositoryInterface;

class BoardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(BoardRepositoryInterface::class, BoardRepositoryEloquent::class); 
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
