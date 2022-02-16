<?php

namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\PaperTypePaperSizeRepository;


class PaperSizePaperTypeService
{
    private $paperTypePaperSizeRepository;
    public function __construct(PaperTypePaperSizeRepository $paperTypePaperSizeRepository)
    {

        $this->paperTypePaperSizeRepository = $paperTypePaperSizeRepository;
    }

    public function findAll()
    {
        return $this->paperTypePaperSizeRepository->findAll();
    }
    public function findOne($id)
    {
        return $this->paperTypePaperSizeRepository->find($id);
    }
    public function findWhere($arr)
    {
        return $this->paperTypePaperSizeRepository->findWhere($arr);
    }
    
    public function create($requests)
    {

        $admin_data = [
            'name' => $requests['name'],
            'email' => $requests['email'],
            'password' => bcrypt($requests['password']),
            'first_password' => $requests['first_password'],

        ];

        return $this->paperTypePaperSizeRepository->create($admin_data);
    }

    public function update($data)
    {
        $admin_data=$this->validateUpdateData($data);
        return $this->paperTypePaperSizeRepository->update($admin_data, $data['id']);

    }

    public function validateUpdateData($data){
        $admin_data=[];
        if(key_exists('name',$data)){
            $admin_data['name']=$data['name'];
        }
        if(key_exists('email',$data)){
            $admin_data['email']=$data['email'];
        }
        if(key_exists('first_password',$data)){
            $admin_data['first_password']=$data['first_password'];
        }
        if(key_exists('password',$data)&&$data['password'] !=null){
            $admin_data['password']=bcrypt($data['password']);
        }
        return $admin_data;
        
    }
    /*public function getAdminPermissions()
    {
    return $this->paperTypePaperSizeRepository->getPermissions();
    }*/
    public function deleteOne($id)
    {
        $admin = $this->paperTypePaperSizeRepository->findWhere(['id' => $id])->first();
        return $admin->delete();
    }
    public function checkExistPass($store_id, $old_pass)
    {
        $store_pass = $this->paperTypePaperSizeRepository->getPass($store_id);

        if (!Hash::check($old_pass, $store_pass)) {
            return false;
        }
        return true;
    }

}
