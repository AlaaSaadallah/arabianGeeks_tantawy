<?php

namespace Modules\CategoryModule\Repository;

use Modules\CategoryModule\Entities\Category;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class CategoryRepository extends BaseRepository
{
    public function model()
    {
        return Category::class;
    }
    function getPass($id)
    {
        $pass = Category::where('id', $id)->pluck('password')->first();
        return $pass;
    }

    // public function findAll()
    // {
    //     return Category::where('id', '!=', 1)->get();
    // }

    public function getByIds($ids)
    {
        return Category::whereIN('id', $ids)->get();
    }

    public function getField($id, $field)
    {
        $admin = Category::where('id', $id)->first();
        return $admin[$field];
    }
    public function findWith($array_with)
    {
        return Category::where('id', '!=', 1)->with($array_with)->get();
    }

   

}
