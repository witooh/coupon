<?php

namespace Shop;

use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Shop\Repositories\IShopRepository', 'Shop\Repositories\ShopEloquent');

        $this->app->singleton('Shop\Manager\IManager', 'Shop\Manager\Manager');

        $this->app->singleton('Shop\Coupon\Stat\IStat', 'Shop\Coupon\Stat\Stat');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}