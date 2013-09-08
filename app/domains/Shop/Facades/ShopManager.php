<?php

namespace Shop\Facades;

use Illuminate\Support\Facades\Facade;

class ShopManager extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Shop\Manager\IManager';
    }
}