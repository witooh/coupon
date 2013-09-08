<?php
namespace Shop\Coupon\Redeemer\Validators;


use Witooh\Validators\BaseValidator;

class RedeemValidator extends BaseValidator
{

    protected $rule = array(
        'coupon_id' => 'not_expired|cur_action:"collected"',
    );

    protected $messages = array(
        'cur_action' => 'Coupon cannot redeem. The coupon isn\'t in collected status.',
    );

    protected $extends = array(
        'Shop\Coupon\CustomValidation@CurAction',
        'Shop\Coupon\CustomValidation@NotExpired',
    );
}