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
      

}
