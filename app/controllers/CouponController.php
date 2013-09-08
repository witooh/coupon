<?php

class CouponController extends BaseController
{

    public function Create()
    {
        $coupon = CouponManager::create(Input::all());

        $data           = $coupon['coupon']->toArray();
        $data['action'] = $coupon['use_coupon']->toArray();

        return Response::json($data);
    }

    public function UseCoupon()
    {
        $useCoupon = CouponRedeemer::useCoupon(Input::all());

        return Response::json($useCoupon->toArray());
    }

    public function Stat($filter)
    {
        switch ($filter) {
            case "monthly":
                $data = CouponStat::sumCouponInMonthly();
                break;
            case "weekly":
                $data = CouponStat::sumCouponInWeekly();
                break;
            default:
                throw new NotFoundException;
        }

        return Response::json($data->toArray());
    }
}