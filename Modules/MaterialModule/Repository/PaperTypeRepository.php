<?php

namespace Modules\MaterialModule\Repository;


use Modules\MaterialModule\Entities\PaperType;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class PaperTypeRepository extends BaseRepository
{
    public function model()
    {
        return PaperType::class;
    }
    function getPass($id)
    {
        $pass = PaperType::where('id', $id)->pluck('password')->first();
        return $pass;
    }

    public function findAll()
    {
        return PaperType::where('id', '!=', 1)->get();
    }

    public function getByIds($ids)
    {
        return PaperType::whereIN('id', $ids)->get();
    }

    public function getField($id, $field)
    {
        $admin = PaperType::where('id', $id)->first();
        return $admin[$field];
    }
    public function findWith($array_with)
    {
        return PaperType::where('id', '!=', 1)->with($array_with)->get();
    }

   

}
