<?php

namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\PrintOptionRepository;

class PrintOptionService
{
    private $printOptionRepository;
    public function __construct(PrintOptionRepository $printOptionRepository)
    {

        $this->printOptionRepository = $printOptionRepository;
    }

    public function findAll()
    {
        return $this->printOptionRepository->findAll();
    }
    public function findOne($id)
    {
        return $this->printOptionRepository->find($id);
    }

   

}
