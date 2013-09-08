<?php
namespace Shop\Coupon\Stat;

interface IStat
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sumCouponInWeekly();

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sumCouponInMonthly();
}