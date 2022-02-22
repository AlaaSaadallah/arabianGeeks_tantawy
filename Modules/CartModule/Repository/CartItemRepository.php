<?php

namespace Modules\CartModule\Repository;


use Modules\CartModule\Entities\CartItem;
use Prettus\Repository\Eloquent\BaseRepository;

class CartItemRepository  extends BaseRepository
{
    function model()
    {
        return CartItem::class;
    }
}
