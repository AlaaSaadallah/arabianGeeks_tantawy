<?php
namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\RegaRepository;

class RegaService
{
    private $colorRepository;
    public function __construct(RegaRepository $regaRepository)
    {

        $this->regaRepository = $regaRepository;
    }

    public function findAll()
    {
        return $this->regaRepository->all();
    }
    public function findOne($id)
    {
        // dd($id);
        return $this->regaRepository->find($id);
    }

    public function update($data)
    {
        return $this->regaRepository->update($data,$data['id']);
    }

}
