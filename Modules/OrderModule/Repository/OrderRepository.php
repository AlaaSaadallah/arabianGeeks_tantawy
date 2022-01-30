<?php

namespace Modules\OrderModule\Repository;

use Modules\OrderModule\Entities\Order;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class OrderRepository extends BaseRepository
{
    public function model()
    {
        return Order::class;
    }
    function genOrderNu()
    {
        $latestNumber = Order::max('order_nu');
        if ($latestNumber == null) {
            $new_number = 1000;
        } else {
            $new_number = $latestNumber + 1;
        }
        return $new_number;
    }
    
    public function findWith($array_with)
    {
        return Order::where('id', '!=', 1)->with($array_with)->get();
    }

   

}
