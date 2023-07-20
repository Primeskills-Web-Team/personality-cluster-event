<?php

namespace App\Providers;

use App\Services\Impl\PersonalityClusterServiceImpl;
use App\Services\PersonalityCluster;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private $services = [
        PersonalityCluster::class => PersonalityClusterServiceImpl::class
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->services as $k => $v) {
            $this->app->bind($k, $v);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
