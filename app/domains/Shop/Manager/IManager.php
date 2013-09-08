<?php
namespace Shop\Manager;

interface IManager
{

    /**
     * @param array $attr
     * @return \Shop\Entities\Shop
     */
    public function create($attr);
}