<?php

namespace Modules\MaterialModule\Repository;

use Modules\MaterialModule\Entities\Color;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class ColorRepository extends BaseRepository
{
    public function model()
    {
        return Color::class;
    }
    function getPass($id)
    {
        $pass = Color::where('id', $id)->pluck('password')->first();
        return $pass;
    }

    public function findAll()
    {
        return Color::where('id', '!=', 1)->get();
    }

    public function getByIds($ids)
    {
        return Color::whereIN('id', $ids)->get();
    }

    public function getField($id, $field)
    {
        $admin = Color::where('id', $id)->first();
        return $admin[$field];
    }
    public function findWith($array_with)
    {
        return Color::where('id', '!=', 1)->with($array_with)->get();
    }

   

}
