<?php

namespace Shop\Coupon\Repositories;

use Base\Repositories\IBaseRepository;

interface ICouponRepository extends IBaseRepository
{
    /**
     * @param int $couponId
     * @return bool
     */
    public function findExpired($couponId);

    /**
     * @param int $couponId
     * @return int
     */
    public function findExist($couponId);

    /**
     * @param int $couponId
     * @return \Carbon\Carbon
     */
    public function findActive($couponId);
}