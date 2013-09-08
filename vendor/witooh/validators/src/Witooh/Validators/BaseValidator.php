<?php
namespace Witooh\Validators;

use Illuminate\Support\Facades\Validator as LaravelValidator;
use Illuminate\Support\Str;

class BaseValidator implements IBaseValidator
{

    /**
     * @var \Illuminate\Validation\Validator
     */
    protected $laravelValidator;
    /**
     * @var array
     */
    protected $rule;

    /**
     * @var array
     */
    protected $messages = array();
    /**
     * @var array
     */
    protected $extends = array();

    public function __construct(array $data)
    {

        foreach ($this->extends as $extend) {
            $parse = Str::parseCallback($extend, null);
            $name  = Str::snake($parse[1]);
            LaravelValidator::extend($name, $extend);
        }

        $this->laravelValidator = LaravelValidator::make($data, $this->rule, $this->messages);
    }

    /**
     * @return bool
     */
    public function passes()
    {
        return $this->laravelValidator->passes();
    }

    /**
     * @return bool
     */
    public function failes()
    {
        return $this->laravelValidator->fails();
    }

    /**
     * @return \Illuminate\Support\MessageBag
     */
    public function getErrors()
    {
        return $this->laravelValidator->errors();
    }

    /**
     * @return array
     */
    public function getRule()
    {
        return $this->rule;
    }
}