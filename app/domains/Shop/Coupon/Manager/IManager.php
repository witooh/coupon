<?php
namespace Shop\Coupon\Manager;

interface IManager
{

    /**
     * @param array $attr
     * @return array
     */
    public function create($attr);
}