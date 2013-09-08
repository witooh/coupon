<?php
namespace Shop\Coupon\Entities;

/**
 * An Eloquent Model: 'Shop\Coupon\Entities\Coupon'
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $coupon_name
 * @property \Carbon\Carbon $active_date
 * @property \Carbon\Carbon $expire_date
 */
class Coupon extends \Eloquent
{
    /**
     * @var string
     */
    protected $table = "coupon";
    /**
     * @var array
     */
    protected $fillable = array('shop_id', 'coupon_name', 'active_date', 'expire_date');
    /**
     * @var bool
     */
    public $timestamps = false;
}