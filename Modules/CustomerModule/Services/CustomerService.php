<?php

namespace Modules\CustomerModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\CustomerModule\Repository\CustomerRepository;

class CustomerService
{
    private $customerRepository;
    public function __construct(CustomerRepository $customerRepository)
    {

        $this->customerRepository = $customerRepository;
    }

    public function findAll()
    {
        return $this->customerRepository->findAll();
    }
    public function findOne($id)
    {
        return $this->customerRepository->find($id);
    }

    public function create($requests)
    {

        $customer_data = [
            'name' => $requests['name'],
            'email' => $requests['email'],
            'password' => bcrypt($requests['password']),
            'first_password' => $requests['first_password'],

        ];

        return $this->customerRepository->create($customer_data);
    }

    public function update($data)
    {
        $customer_data=$this->validateUpdateData($data);
        return $this->customerRepository->update($customer_data, $data['id']);

    }

    public function validateUpdateData($data){
        $customer_data=[];
        if(key_exists('name',$data)){
            $customer_data['name']=$data['name'];
        }
        if(key_exists('email',$data)){
            $customer_data['email']=$data['email'];
        }
        if(key_exists('first_password',$data)){
            $customer_data['first_password']=$data['first_password'];
        }
        if(key_exists('password',$data)&&$data['password'] !=null){
            $customer_data['password']=bcrypt($data['password']);
        }
        return $customer_data;
        
    }
    /*public function getCustomerPermissions()
    {
    return $this->customerRepository->getPermissions();
    }*/
    public function deleteOne($id)
    {
        $customer = $this->customerRepository->findWhere(['id' => $id])->first();
        return $customer->delete();
    }
    public function checkExistPass($store_id, $old_pass)
    {
        $store_pass = $this->customerRepository->getPass($store_id);

        if (!Hash::check($old_pass, $store_pass)) {
            return false;
        }
        return true;
    }

}
