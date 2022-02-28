<?php

namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\PaperTypePaperSizeRepository;


class PaperSizePaperTypeService
{
    private $paperTypePaperSizeRepository;
    public function __construct(PaperTypePaperSizeRepository $paperTypePaperSizeRepository)
    {

        $this->paperTypePaperSizeRepository = $paperTypePaperSizeRepository;
    }

    public function findAll()
    {
        return $this->paperTypePaperSizeRepository->findAll();
    }
    public function findOne($id)
    {
        return $this->paperTypePaperSizeRepository->find($id);
    }
    public function findWhere($arr)
    {
        return $this->paperTypePaperSizeRepository->findWhere($arr);
    }
    
  
}
