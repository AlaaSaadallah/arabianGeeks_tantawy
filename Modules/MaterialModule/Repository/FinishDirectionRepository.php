<?php

namespace Modules\MaterialModule\Repository;

use Modules\MaterialModule\Entities\FinishDirection;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class FinishDirectionRepository extends BaseRepository
{
    public function model()
    {
        return FinishDirection::class;
    }
    function getPass($id)
    {
        $pass = FinishDirection::where('id', $id)->pluck('password')->first();
        return $pass;
    }

    public function findAll()
    {
        return FinishDirection::where('id', '!=', 1)->get();
    }

    public function getByIds($ids)
    {
        return FinishDirection::whereIN('id', $ids)->get();
    }

    public function getField($id, $field)
    {
        $admin = FinishDirection::where('id', $id)->first();
        return $admin[$field];
    }
    public function findWith($array_with)
    {
        return FinishDirection::where('id', '!=', 1)->with($array_with)->get();
    }

   

}
