<?php

namespace Modules\MaterialModule\Repository;

use Modules\MaterialModule\Entities\PaperSize;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class PaperSizeRepository extends BaseRepository
{
    public function model()
    {
        return PaperSize::class;
    }
    function getPass($id)
    {
        $pass = PaperSize::where('id', $id)->pluck('password')->first();
        return $pass;
    }

    public function findAll()
    {
        return PaperSize::where('id', '!=', 1)->get();
    }

    public function getByIds($ids)
    {
        return PaperSize::whereIN('id', $ids)->get();
    }

    public function getField($id, $field)
    {
        $admin = PaperSize::where('id', $id)->first();
        return $admin[$field];
    }
    public function findWith($array_with)
    {
        return PaperSize::where('id', '!=', 1)->with($array_with)->get();
    }

   

}
