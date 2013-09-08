<?php

namespace Shop\Coupon\Repositories;

use Base\Repositories\EloquentBaseRepository;
use Carbon\Carbon;
use Shop\Coupon\Entities\Coupon;
use DB;

class CouponEloquent extends EloquentBaseRepository implements ICouponRepository
{
    /**
     * @param array $data
     * @return \Shop\Coupon\Entities\Coupon
     */
    public function instance($data = array())
    {
        return new Coupon($data);
    }

    /**
     * @param int $couponId
     * @return bool
     */
    public function findExpired($couponId)
    {
        $count = Coupon::where('id', $couponId)
            ->where('expire_date', '<', DB::raw('NOW()'))
            ->count();

        return $count > 0 ? true : false;
    }

    /**
     * @param int $couponId
     * @return int
     */
    public function findExist($couponId)
    {
        return Coupon::where('id', $couponId)->count();
    }

    /**
     * @param int $couponId
     * @return \Carbon\Carbon
     */
    public function findActive($couponId)
    {
        $activeDate = Coupon::where('id', $couponId)->pluck('active_date');
        return Carbon::createFromFormat('Y-m-d', $activeDate);
    }
}