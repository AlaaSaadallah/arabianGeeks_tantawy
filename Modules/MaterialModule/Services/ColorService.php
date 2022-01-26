<?php

namespace Modules\MaterialModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Repository\ColorRepository;

class ColorService
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
        return $this->colorRepository->find($id);
    }

    public function create($requests)
    {

        $admin_data = [
            'name' => $requests['name'],
            'email' => $requests['email'],
            'password' => bcrypt($requests['password']),
            'first_password' => $requests['first_password'],

        ];

        return $this->colorRepository->create($admin_data);
    }

    public function update($data)
    {
        $admin_data=$this->validateUpdateData($data);
        return $this->colorRepository->update($admin_data, $data['id']);

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
    return $this->colorRepository->getPermissions();
    }*/
    public function deleteOne($id)
    {
        $admin = $this->colorRepository->findWhere(['id' => $id])->first();
        return $admin->delete();
    }
    public function checkExistPass($store_id, $old_pass)
    {
        $store_pass = $this->colorRepository->getPass($store_id);

        if (!Hash::check($old_pass, $store_pass)) {
            return false;
        }
        return true;
    }

}
