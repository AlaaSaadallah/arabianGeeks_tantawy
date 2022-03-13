<?php

namespace Modules\CartModule\Repository;


use Modules\CartModule\Entities\Cart;
use Modules\CartModule\Entities\CartItem;
use Prettus\Repository\Eloquent\BaseRepository;

class CartRepository  extends BaseRepository
{
    function model()
    {
        return Cart::class;
    }
    // function getCustomerCart()
    // {
    //     return Cart::where('customer_id', $user->customer->id)->first();
    // }


   
}
