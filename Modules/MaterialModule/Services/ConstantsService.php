<?php
namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\ConstantRepository;

class ConstantsService
{
    private $constantRepository;
    public function __construct(ConstantRepository $constantRepository)
    {

        $this->constantRepository = $constantRepository;
    }

    public function findAll()
    {
        return $this->constantRepository->all();
    }
    public function findOne($id)
    {
        // dd($id);
        return $this->constantRepository->find($id);
    }

    public function update($data)
    {
        return $this->constantRepository->update($data,$data['id']);
    }

}
