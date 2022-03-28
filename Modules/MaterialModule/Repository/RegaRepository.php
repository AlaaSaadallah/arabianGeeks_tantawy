<?php

namespace Modules\MaterialModule\Repository;

use Modules\MaterialModule\Entities\FoldNumber;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Permission;

class RegaRepository extends BaseRepository
{
    public function model()
    {
        return FoldNumber::class;
    }
      

}
