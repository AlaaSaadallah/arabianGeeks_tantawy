<?php

namespace Modules\CategoryModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\CategoryModule\Repository\CategoryRepository;

class CategoryService
{
    private $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {

        $this->categoryRepository = $categoryRepository;
    }

    public function findAll()
    {
        return $this->categoryRepository->all();
    }
    public function findOne($id)
    {
        return $this->categoryRepository->find($id);
    }

    public function findWhere($arr)
    {
        return $this->categoryRepository->findWhere($arr);

    }

    public function create($requests)
    {

        $admin_data = [
            'name' => $requests['name'],
            'email' => $requests['email'],
            'password' => bcrypt($requests['password']),
            'first_password' => $requests['first_password'],

        ];

        return $this->categoryRepository->create($admin_data);
    }

    public function update($data)
    {
        $admin_data=$this->validateUpdateData($data);
        return $this->categoryRepository->update($admin_data, $data['id']);

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
    return $this->categoryRepository->getPermissions();
    }*/
    public function deleteOne($id)
    {
        $admin = $this->categoryRepository->findWhere(['id' => $id])->first();
        return $admin->delete();
    }
    public function checkExistPass($store_id, $old_pass)
    {
        $store_pass = $this->categoryRepository->getPass($store_id);

        if (!Hash::check($old_pass, $store_pass)) {
            return false;
        }
        return true;
    }

}
