<?php

namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\PaperTypeRepository;

class PaperTypeService
{
    private $paperTypeRepository;
    public function __construct(PaperTypeRepository $paperTypeRepository)
    {

        $this->paperTypeRepository = $paperTypeRepository;
    }

    public function findAll()
    {
        return $this->paperTypeRepository->findAll();
    }
    public function findOne($id)
    {
        return $this->paperTypeRepository->find($id);
    }
    public function findWhere($arr)
    {
        return $this->paperTypeRepository->findWhere($arr);
    }
    
    public function create($requests)
    {

        $admin_data = [
            'name' => $requests['name'],
            'email' => $requests['email'],
            'password' => bcrypt($requests['password']),
            'first_password' => $requests['first_password'],

        ];

        return $this->paperTypeRepository->create($admin_data);
    }

    

    
    /*public function getAdminPermissions()
    {
    return $this->paperTypeRepository->getPermissions();
    }*/
    public function deleteOne($id)
    {
        $admin = $this->paperTypeRepository->findWhere(['id' => $id])->first();
        return $admin->delete();
    }
    public function checkExistPass($store_id, $old_pass)
    {
        $store_pass = $this->paperTypeRepository->getPass($store_id);

        if (!Hash::check($old_pass, $store_pass)) {
            return false;
        }
        return true;
    }

}
