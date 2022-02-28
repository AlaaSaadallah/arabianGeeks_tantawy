<?php
namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\ColorRepository;

class ColorsService
{
    private $colorRepository;
    public function __construct(ColorRepository $colorRepository)
    {

        $this->colorRepository = $colorRepository;
    }

    public function findAll()
    {
        return $this->colorRepository->findAll();
    }
    public function findOne($id)
    {
        // dd($id);
        return $this->colorRepository->find($id);
    }

  

}
