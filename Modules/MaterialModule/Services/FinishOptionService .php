<?php

namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\FinishOptionRepository;

class FinishOptionService
{
    private $finishOptionRepository;
    public function __construct(FinishOptionRepository $finishOptionRepository)
    {

        $this->finishOptionRepository = $finishOptionRepository;
    }

    public function findAll()
    {
        return $this->finishOptionRepository->findAll();
    }
    public function findOne($id)
    {
        return $this->finishOptionRepository->find($id);
    }



}
