<?php

namespace Modules\MaterialModule\Repository;

use Modules\MaterialModule\Entities\FinishOption;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class FinishOptionRepository extends BaseRepository
{
    public function model()
    {
        return FinishOption::class;
    }
    function getPass($id)
    {
        $pass = FinishOption::where('id', $id)->pluck('password')->first();
        return $pass;
    }

    public function findAll()
    {
        return FinishOption::where('id', '!=', 1)->get();
    }

    public function getByIds($ids)
    {
        return FinishOption::whereIN('id', $ids)->get();
    }

    public function getField($id, $field)
    {
        $admin = FinishOption::where('id', $id)->first();
        return $admin[$field];
    }
    public function findWith($array_with)
    {
        return FinishOption::where('id', '!=', 1)->with($array_with)->get();
    }

   

}
