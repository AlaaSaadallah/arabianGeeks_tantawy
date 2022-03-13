<?php

namespace Modules\CustomerModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\CartModule\Entities\Cart;
use Modules\LocationModule\Entities\City;

class Customer  extends Authenticatable
{
    protected $guard = 'customer';

    protected $table = "customers";

    protected $guarded = [];
    
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }
   
}
