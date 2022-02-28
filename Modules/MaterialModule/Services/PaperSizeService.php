<?php

namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\PaperSizeRepository;

class PaperSizeService
{
    private $paperSizeRepository;
    public function __construct(PaperSizeRepository $paperSizeRepository)
    {

        $this->paperSizeRepository = $paperSizeRepository;
    }

    public function findAll()
    {
        return $this->paperSizeRepository->findAll();
    }

    public function findWhere($arr)
    {
        return $this->paperSizeRepository->findWhere($arr);
    }
    public function findOne($id)
    {
        return $this->paperSizeRepository->find($id);
    }

}
