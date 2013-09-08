<?php
namespace Shop\Entities;

/**
 * Class Shop
 *
 * @package Models
 * @Entity
 * @Table (name="shop")
 * @property integer $id
 * @property string $shop_name
 * @property string $owner_username
 * @property string $owner_password
 */
class Shop extends \Eloquent
{
    /**
     * @var string
     */
    protected $table = "shop";
    /**
     * @var array
     */
    protected $fillable = array('shop_name', 'owner_username', 'owner_password');
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * MD5 when owner_password is assigned
     * @param $value
     */
    public function setOwnerPasswordAttribute($value)
    {
        $this->attributes['owner_password'] = md5("!@#$value#@!");
    }
}