<?php

namespace Shop\Coupon\Manager\Validators;

use Witooh\Validators\BaseValidator;

class Create extends BaseValidator
{
    /**
     * @var array
     */
    protected $rule = array(
        'shop_id'     => 'required|shop_exist',
        'coupon_name' => 'required|max:100',
        'active_date' => 'required|date|date_format:"Y-m-d"',
        'expire_date' => 'required|date|date_format:"Y-m-d"',
    );

    protected $messages = array(
        'shop_exist'=>'Shop doesn\'t exist',
    );

    protected $extends = array(
        'Shop\CustomValidation@ShopExist',
    );
}