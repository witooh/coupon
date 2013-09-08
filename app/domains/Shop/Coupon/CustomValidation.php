<?php
namespace Shop\Coupon;

use Shop\Coupon\Repositories\ICouponRepository;
use Shop\Coupon\Repositories\IUseCouponRepository;

class CustomValidation
{

    protected $useCouponRepository;
    protected $couponRepository;

    public function __construct(IUseCouponRepository $useCouponRepository, ICouponRepository $couponRepository)
    {
        $this->useCouponRepository = $useCouponRepository;
        $this->couponRepository    = $couponRepository;
    }

    public function CouponExist($attribute, $value, $parameters)
    {
        return $this->couponRepository->findExist($value);
    }

    public function NotExpired($attribute, $value, $parameters)
    {
        return !$this->couponRepository->findExpired($value);
    }

    public function CurAction($attribute, $value, $parameters)
    {
        $action = $this->useCouponRepository->CurrentAction($value);

        return $action == $parameters[0];
    }

}