<?php

namespace Shop\Coupon\Facades;

use Illuminate\Support\Facades\Facade;

class CouponStat extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Shop\Coupon\Stat\IStat';
    }
}