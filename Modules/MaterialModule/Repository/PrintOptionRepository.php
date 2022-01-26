<?php

namespace Modules\MaterialModule\Repository;

use Modules\MaterialModule\Entities\PrintOption;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class PrintOptionRepository extends BaseRepository
{
    public function model()
    {
        return PrintOption::class;
    }
    function getPass($id)
    {
        $pass = PrintOption::where('id', $id)->pluck('password')->first();
        return $pass;
    }

    public function findAll()
    {
        return PrintOption::where('id', '!=', 1)->get();
    }

    public function getByIds($ids)
    {
        return PrintOption::whereIN('id', $ids)->get();
    }

    public function getField($id, $field)
    {
        $admin = PrintOption::where('id', $id)->first();
        return $admin[$field];
    }
    public function findWith($array_with)
    {
        return PrintOption::where('id', '!=', 1)->with($array_with)->get();
    }

   

}
