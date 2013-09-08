<?php

namespace Shop\Repositories;

use Base\Repositories\EloquentBaseRepository;
use Shop\Entities\Shop;

class ShopEloquent extends EloquentBaseRepository implements IShopRepository
{

    /**
     * @param array $data
     * @return \Shop\Entities\Shop
     */
    public function instance($data = array())
    {
        return new Shop($data);
    }

    /**
     * @param int $shopId
     * @return int
     */
    public function findExist($shopId)
    {
        return Shop::where('id', $shopId)->count();
    }

    /**
     * @param string $name
     * @return int
     */
    public function findUniqueByName($name)
    {
        return Shop::where('shop_name', $name)->count();
    }
}