<?php
namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\CutStyleRepository;

class CutStyleService
{
    private $cutStyleRepository;
    public function __construct(CutStyleRepository $cutStyleRepository)
    {

        $this->cutStyleRepository = $cutStyleRepository;
    }

    public function findAll()
    {
        return $this->cutStyleRepository->findAll();
    }
    public function findOne($id)
    {
        // dd($id);
        return $this->cutStyleRepository->find($id);
    }

  

}
