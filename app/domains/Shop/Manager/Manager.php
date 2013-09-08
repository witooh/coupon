<?php
namespace Shop\Manager;

use Shop\Repositories\IShopRepository;
use ValidatorFactory;

class Manager implements IManager
{
    /**
     * @var \Shop\Repositories\IShopRepository
     */
    protected $shopRepository;

    /**
     * @param IShopRepository $shopRepository
     */
    public function __construct(IShopRepository $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }

    /**
     * @param array $attr
     * @return \Shop\Entities\Shop
     * @throws \ValidateException
     */
    public function create($attr)
    {
        $validator = ValidatorFactory::make('Shop\Manager\Validators\Create', $attr);

        if ($validator->failes()) {
            throw new \ValidateException($validator->getErrors());
        }

        return $this->shopRepository->store($attr);
    }

}