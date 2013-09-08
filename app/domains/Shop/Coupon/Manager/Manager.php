<?php
namespace Shop\Coupon\Manager;

use Carbon\Carbon;
use Shop\Coupon\Entities\UseCoupon;
use Shop\Coupon\Repositories\ICouponRepository;
use Shop\Coupon\Repositories\IUseCouponRepository;
use Shop\Coupon\Manager\Validators\Create;
use DB;

class Manager implements IManager
{
    /**
     * @var \Shop\Coupon\Repositories\ICouponRepository
     */
    protected $couponRepository;

    /**
     * @var \Shop\Coupon\Repositories\IUseCouponRepository
     */
    protected $useCouponRepository;

    /**
     * @param ICouponRepository $couponRepository
     * @param IUseCouponRepository $useCouponRepository
     */
    public function __construct(
        ICouponRepository $couponRepository,
        IUseCouponRepository $useCouponRepository
    )
    {
        $this->couponRepository    = $couponRepository;
        $this->useCouponRepository = $useCouponRepository;
    }

    /**
     * @param array $attr
     * @return array
     * @throws \ValidateException
     * @throws \Exception
     */
    public function create($attr)
    {
        $validator = new Create($attr);

        if ($validator->failes()) {
            throw new \ValidateException($validator->getErrors());
        }

        $pdo = DB::getPdo();
        $pdo->beginTransaction();

        try {
            /** @var \Shop\Coupon\Entities\Coupon $coupon */
            $coupon = $this->couponRepository->store($attr);

            $useCoupon = $this->useCouponRepository->store(array(
                'coupon_id'   => $coupon->id,
                'action'      => UseCoupon::ACTION_ACTIVED,
                'action_time' => Carbon::now(),
            ));

            $pdo->commit();

        } catch (\Exception $e) {
            $pdo->rollBack();
            throw new \Exception($e->getMessage(), 500);
        }

        return array(
            'coupon'     => $coupon,
            'use_coupon' => $useCoupon
        );
    }

}