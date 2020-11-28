<?php

namespace App\Providers;

use App\Repositories\PermissionRepositoryContract;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PermissionRepositoryContract::class,PermissionRepository::class);
        $this->app->bind(RoleRepositoryContract::class,RoleRepository::class);
    }
}
