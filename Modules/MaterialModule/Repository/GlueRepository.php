<?php

namespace Modules\MaterialModule\Repository;

use Modules\MaterialModule\Entities\Glue;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class GlueRepository extends BaseRepository
{
    public function model()
    {
        return Glue::class;
    }
      

}
