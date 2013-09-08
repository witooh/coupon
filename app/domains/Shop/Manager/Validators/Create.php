<?php

namespace Shop\Manager\Validators;

use Witooh\Validators\BaseValidator;

class Create extends BaseValidator
{
    /**
     * @var array
     */
    protected $rule = array(
        'shop_name'      => 'required|max:100',
        'owner_username' => 'required|max:50',
        'owner_password' => 'required|max:72',
    );
}