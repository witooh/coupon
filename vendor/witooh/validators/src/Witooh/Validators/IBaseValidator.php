<?php
namespace Witooh\Validators;

interface IBaseValidator {

    /**
     * @param array $data
     */
    public function __construct(array $data);

    /**
     * @return bool
     */
    public function passes();

    /**
     * @return bool
     */
    public function failes();

    /**
     * @return \Illuminate\Support\MessageBag
     */
    public function getErrors();

    /**
     * @return array
     */
    public function getRule();
}