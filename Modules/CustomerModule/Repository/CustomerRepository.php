<?php

namespace Modules\CustomerModule\Repository;

use Modules\CustomerModule\Entities\Customer;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class CustomerRepository extends BaseRepository
{
    public function model()
    {
        return Customer::class;
    }
    function getPass($id)
    {
        $pass = Customer::where('id', $id)->pluck('password')->first();
        return $pass;
    }

    public function findAll()
    {
        return Customer::where('id', '!=', 1)->get();
    }

    public function getByIds($ids)
    {
        return Customer::whereIN('id', $ids)->get();
    }

    public function getField($id, $field)
    {
        $admin = Customer::where('id', $id)->first();
        return $admin[$field];
    }
    public function findWith($array_with)
    {
        return Customer::where('id', '!=', 1)->with($array_with)->get();
    }

   

}
