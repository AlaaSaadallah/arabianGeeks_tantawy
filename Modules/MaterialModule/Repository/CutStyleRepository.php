<?php

namespace Modules\MaterialModule\Repository;

use Modules\MaterialModule\Entities\Color;
use Modules\MaterialModule\Entities\CutStyle;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class CutStyleRepository extends BaseRepository
{
    public function model()
    {
        return CutStyle::class;
    }
      

}
