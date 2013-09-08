<?php

namespace Shop\Coupon;

use Illuminate\Support\ServiceProvider;

class CouponServiceProvider extends ServiceProvider
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
        $this->app->singleton('Shop\Coupon\Repositories\ICouponRepository', 'Shop\Coupon\Repositories\CouponEloquent');
        $this->app->singleton('Shop\Coupon\Repositories\IUseCouponRepository',
            'Shop\Coupon\Repositories\UseCouponEloquent');

        $this->app->singleton('Shop\Coupon\Manager\IManager', 'Shop\Coupon\Manager\Manager');
        $this->app->singleton('Shop\Coupon\Redeemer\IRedeemer', 'Shop\Coupon\Redeemer\Redeemer');
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