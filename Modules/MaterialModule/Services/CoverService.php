<?php
namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\CoverRepository;

class CoverService
{
    private $coverRepository;
    public function __construct(CoverRepository $coverRepository)
    {

        $this->coverRepository = $coverRepository;
    }

    public function findAll()
    {
        return $this->coverRepository->findAll();
    }
    public function findOne($id)
    {
        // dd($id);
        return $this->coverRepository->find($id);
    }

  

}
