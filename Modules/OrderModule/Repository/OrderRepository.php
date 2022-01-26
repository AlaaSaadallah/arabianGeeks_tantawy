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
    function getPass($id)
    {
        $pass = Order::where('id', $id)->pluck('password')->first();
        return $pass;
    }

    public function findAll()
    {
        return Order::where('id', '!=', 1)->get();
    }

    public function getByIds($ids)
    {
        return Order::whereIN('id', $ids)->get();
    }

    public function getField($id, $field)
    {
        $admin = Order::where('id', $id)->first();
        return $admin[$field];
    }
    public function findWith($array_with)
    {
        return Order::where('id', '!=', 1)->with($array_with)->get();
    }

   

}
