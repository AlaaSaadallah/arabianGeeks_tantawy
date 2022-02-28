<?php

namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\PaperTypeRepository;

class PaperTypeService
{
    private $paperTypeRepository;
    public function __construct(PaperTypeRepository $paperTypeRepository)
    {

        $this->paperTypeRepository = $paperTypeRepository;
    }

    public function findAll()
    {
        return $this->paperTypeRepository->findAll();
    }
    public function findOne($id)
    {
        return $this->paperTypeRepository->find($id);
    }
    public function findWhere($arr)
    {
        return $this->paperTypeRepository->findWhere($arr);
    }
    
 

}
