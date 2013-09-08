<?php
namespace Shop\Coupon\Entities;

/**
 * An Eloquent Model: 'Shop\Coupon\Entities\UseCoupon'
 *
 * @property integer $id
 * @property integer $coupon_id
 * @property string $action
 * @property \Carbon\Carbon $action_time
 */
class UseCoupon extends \Eloquent
{
    const ACTION_ACTIVED   = 'active';
    const ACTION_COLLECTED = 'collected';
    const ACTION_REDEEMED  = 'redeemed';

    /**
     * @var string
     */
    protected $table = "use_coupon";
    /**
     * @var array
     */
    protected $fillable = array('coupon_id', 'action', 'action_time');
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Convert action_time Carbon to string date time format
     * @return mixed
     */
    public function getActionTimeAttribute()
    {
        if(empty($this->attributes['action_time']))
        {
            return null;
        }
        
        return with(new \DateTime($this->attributes['action_time']))->format('c');
    }
}