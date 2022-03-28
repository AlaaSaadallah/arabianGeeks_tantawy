<?php

namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\FinishDirectionRepository;

class FinishDirectionService
{
    private $finishDirectionRepository;
    public function __construct(FinishDirectionRepository $finishDirectionRepository)
    {

        $this->finishDirectionRepository = $finishDirectionRepository;
    }

    public function findAll()
    {
        return $this->finishDirectionRepository->all();
    }
    public function findOne($id)
    {
        return $this->finishDirectionRepository->find($id);
    }


    public function update($data)
    {
        return $this->finishDirectionRepository->update($data,$data['id']);
    }
}
