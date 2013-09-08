<?php
namespace Shop;

use Illuminate\Validation\Validator;
use Shop\Repositories\IShopRepository;

class CustomValidation extends Validator
{
    /**
     * @var Repositories\IShopRepository
     */
    protected $shopRepository;

    public function __construct(IShopRepository $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }

    public function ShopExist($attribute, $value, $parameters)
    {
        return $this->shopRepository->findExist($value);
    }

    public function ShopUniqueName($attribute, $value, $parameters)
    {
        return !$this->shopRepository->findUniqueByName($value);
    }
}