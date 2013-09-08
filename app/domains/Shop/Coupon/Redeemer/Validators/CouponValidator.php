<?php
namespace Shop\Coupon\Redeemer\Validators;

use Witooh\Validators\BaseValidator;

class CouponValidator extends BaseValidator
{

    protected $rule = array(
        'coupon_id'   => 'required|coupon_exist',
        'action'      => 'required|in:"collected","redeemed"|max:10',
        'action_time' => 'required|date'
    );

    protected $messages = array(
        'coupon_exist' => 'Coupon doesn\'t exist',
    );

    protected $extends = array(
        'Shop\Coupon\CustomValidation@CouponExist',
    );
}
