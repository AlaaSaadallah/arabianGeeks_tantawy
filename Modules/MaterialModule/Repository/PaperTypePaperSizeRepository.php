<?php

namespace Modules\MaterialModule\Repository;

use Modules\MaterialModule\Entities\PaperTypePaperSize;
use Prettus\Repository\Eloquent\BaseRepository;

class PaperTypePaperSizeRepository extends BaseRepository
{
    public function model()
    {
        return PaperTypePaperSize::class;
    }
   
   

}
