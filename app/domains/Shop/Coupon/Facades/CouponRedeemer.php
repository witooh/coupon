<?php

namespace Shop\Coupon\Facades;

use Illuminate\Support\Facades\Facade;

class CouponRedeemer extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Shop\Coupon\Redeemer\IRedeemer';
    }
}