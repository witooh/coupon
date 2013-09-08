<?php

namespace Shop\Coupon\Facades;

use Illuminate\Support\Facades\Facade;

class CouponManager extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Shop\Coupon\Manager\IManager';
    }
}