<?php

namespace Witooh\Validators\Facades;

use Illuminate\Support\Facades\Facade;

class ValidatorFactory extends Facade {

    protected static function getFacadeAccessor() { return 'Witooh\Validators\IValidatorFactory'; }
}