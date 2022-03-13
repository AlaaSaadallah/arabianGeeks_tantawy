<?php

namespace Modules\CartModule\Entities;

use App\Status;
use Illuminate\Database\Eloquent\Model;
use Modules\CustomerModule\Entities\Customer;

class Cart extends Model
{
    protected $table = "carts";
    protected $guarded = [];


    function customer()
    {
        return $this->belongsTo(Customer::class,'user_id');
    }

    public function getImagePathAttribute()
    {
      
         
                return asset('public/uploads/carts/' . $this->attributes['image']);
            
        
    }
}
