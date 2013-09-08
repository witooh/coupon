<?php
namespace Shop\Coupon\Stat;

use Shop\Coupon\Entities\UseCoupon;
use Shop\Coupon\Repositories\IUseCouponRepository;

class Stat implements IStat
{

    protected $useCouponRepository;

    public function __construct(IUseCouponRepository $useCouponRepository)
    {
        $this->useCouponRepository = $useCouponRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sumCouponInWeekly()
    {
        return $this->useCouponRepository->sumCouponByActionInWeekly();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sumCouponInMonthly()
    {
        return $this->useCouponRepository->sumCouponByActionInMonthly();
    }
}