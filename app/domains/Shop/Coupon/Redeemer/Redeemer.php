<?php
namespace Shop\Coupon\Redeemer;

use Carbon\Carbon;
use Shop\Coupon\Entities\UseCoupon;
use Shop\Coupon\Redeemer\Validators\CollectValidator;
use Shop\Coupon\Redeemer\Validators\CouponValidator;
use Shop\Coupon\Redeemer\Validators\RedeemValidator;
use Shop\Coupon\Repositories\IUseCouponRepository;

class Redeemer implements IRedeemer
{
    protected $useCouponRepository;

    public function __construct(IUseCouponRepository $useCouponRepository)
    {
        $this->useCouponRepository = $useCouponRepository;
    }

    /**
     * @param array $attr
     * @return \Shop\Coupon\Entities\UseCoupon
     * @throws \ValidateException
     */
    public function useCoupon(array $attr)
    {
        $attr['action_time'] = Carbon::now();

        $validator = null;
        $validator = new CouponValidator($attr);

        if ($validator->failes()) {
            throw new \ValidateException($validator->getErrors());
        }

        if ($attr['action'] == UseCoupon::ACTION_COLLECTED) {
            $validator = new CollectValidator($attr);
        } elseif ($attr['action'] == UseCoupon::ACTION_REDEEMED) {
            $validator = new RedeemValidator($attr);
        }

        if ($validator->failes()) {
            throw new \ValidateException($validator->getErrors());
        }

        return $this->useCouponRepository->store($attr);
    }

    protected function convertInputDateTime($actionTime)
    {

    }
}