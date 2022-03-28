<?php

namespace Modules\MaterialModule\Repository;

use Modules\MaterialModule\Entities\Color;
use Modules\MaterialModule\Entities\Constant;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class ConstantRepository extends BaseRepository
{
    public function model()
    {
        return Constant::class;
    }
      

}
