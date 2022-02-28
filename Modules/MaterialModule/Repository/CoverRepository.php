<?php

namespace Modules\MaterialModule\Repository;

use Modules\MaterialModule\Entities\Cover;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class CoverRepository extends BaseRepository
{
    public function model()
    {
        return Cover::class;
    }
      

}
