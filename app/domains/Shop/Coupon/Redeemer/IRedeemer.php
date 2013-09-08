<?php
namespace Shop\Coupon\Redeemer;

interface IRedeemer
{
    /**
     * @param array $attr
     * @return \Shop\Coupon\Entities\UseCoupon
     * @throws \ValidateException
     */
    public function useCoupon(array $attr);
}