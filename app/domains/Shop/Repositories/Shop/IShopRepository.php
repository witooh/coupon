<?php

namespace Shop\Repositories;


use Base\Repositories\IBaseRepository;

interface IShopRepository extends IBaseRepository
{
    /**
     * @param int $shopId
     * @return int
     */
    public function findExist($shopId);

    /**
     * @param string $name
     * @return int
     */
    public function findUniqueByName($name);
}