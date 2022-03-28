<?php
namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\GlueRepository;

class GlueService
{
    private $colorRepository;
    public function __construct(GlueRepository $glueRepository)
    {

        $this->glueRepository = $glueRepository;
    }

    public function findAll()
    {
        return $this->glueRepository->all();
    }
    public function findOne($id)
    {
        // dd($id);
        return $this->glueRepository->find($id);
    }

    public function update($data)
    {
        return $this->glueRepository->update($data,$data['id']);
    }

}
