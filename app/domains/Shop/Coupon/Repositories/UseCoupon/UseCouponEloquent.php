<?php

namespace Shop\Coupon\Repositories;

use Base\Repositories\EloquentBaseRepository;
use Shop\Coupon\Entities\UseCoupon;
use DB;

class UseCouponEloquent extends EloquentBaseRepository implements IUseCouponRepository
{

    /**
     * @param array $data
     * @return \Shop\Coupon\Entities\UseCoupon
     */
    public function instance($data = array())
    {
        return new UseCoupon($data);
    }

    /**
     * @param $couponId
     * @return string
     */
    public function currentAction($couponId)
    {
        return UseCoupon::where('coupon_id', $couponId)
            ->orderBy('action_time', 'DESC')
            ->pluck('action');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sumCouponByActionInWeekly()
    {
        return UseCoupon::select(array(
                DB::raw('SUM(IF(action = "collected", 1, 0)) as total_collected'),
                DB::raw('SUM(IF(action = "redeemed", 1, 0)) as total_redeemed'),
                DB::raw('DATE_FORMAT(action_time, "W%U %b, %X") AS week'),
            ))
            ->groupBy(DB::raw('WEEK(action_time)'))
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sumCouponByActionInMonthly()
    {
        return UseCoupon::select(array(
                DB::raw('SUM(IF(action = "collected", 1, 0)) as total_collected'),
                DB::raw('SUM(IF(action = "redeemed", 1, 0)) as total_redeemed'),
                DB::raw('DATE_FORMAT(action_time, "%b, %Y") AS month'),
            ))
            ->groupBy(DB::raw('MONTH(action_time)'))
            ->get();
    }
}