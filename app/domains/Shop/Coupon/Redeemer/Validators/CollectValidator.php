<?php
namespace Shop\Coupon\Redeemer\Validators;

use Witooh\Validators\BaseValidator;

class CollectValidator extends BaseValidator
{

    protected $rule = array(
        'coupon_id' => 'active|not_expired|cur_action:"active"',
    );

    protected $messages = array(
        'cur_action' => 'Coupon cannot collect. The coupon isn\'t in active status.',
    );

    protected $extends = array(
        'Shop\Coupon\CustomValidation@CurAction',
        'Shop\Coupon\CustomValidation@NotExpired',
        'Shop\Coupon\CustomValidation@Active',
    );
}