<?php

namespace Shop\Coupon\Repositories;

use Base\Repositories\IBaseRepository;

interface IUseCouponRepository extends IBaseRepository
{
    /**
     * @param $couponId
     * @return string
     */
    public function currentAction($couponId);

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sumCouponByActionInWeekly();

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sumCouponByActionInMonthly();
}