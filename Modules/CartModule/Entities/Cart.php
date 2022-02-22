<?php

namespace Modules\CartModule\Entities;

use App\Status;
use Illuminate\Database\Eloquent\Model;
use Modules\CustomerModule\Entities\Customer;

class Cart extends Model
{
    protected $guarded = [];


    function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // function items()
    // {
    //     return $this->hasMany(CartItem::class);
    // }

    // function promo_code()
    // {
    //     return $this->belongsTo(PaymentMethod::class);
    // }
}
