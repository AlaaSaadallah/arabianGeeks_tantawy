<?php

namespace Modules\OrderModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\OrderModule\Repository\OrderRepository;

class OrderService
{
    private $orderRepository;
    use UploaderHelper;
    public function __construct(OrderRepository $orderRepository)
    {

        $this->orderRepository = $orderRepository;
    }

    public function findAll()
    {
        return $this->orderRepository->findAll();
    }
    public function findOne($id)
    {
        return $this->orderRepository->find($id);
    }

    public function create($requests)
    {

        $order_data = [
            'name' => $requests['name'],
            'email' => $requests['email'],
            'password' => bcrypt($requests['password']),
            'first_password' => $requests['first_password'],

        ];

        return $this->orderRepository->create($order_data);
    }

    public function update($data)
    {
        $order_data=$this->validateUpdateData($data);
        return $this->orderRepository->update($order_data, $data['id']);

    }

    public function validateUpdateData($data){
        $order_data=[];
        if(key_exists('name',$data)){
            $order_data['name']=$data['name'];
        }
        if(key_exists('email',$data)){
            $order_data['email']=$data['email'];
        }
        if(key_exists('first_password',$data)){
            $order_data['first_password']=$data['first_password'];
        }
        if(key_exists('password',$data)&&$data['password'] !=null){
            $order_data['password']=bcrypt($data['password']);
        }
        return $order_data;
        
    }
    /*public function getOrderPermissions()
    {
    return $this->orderRepository->getPermissions();
    }*/
    public function deleteOne($id)
    {
        $order = $this->orderRepository->findWhere(['id' => $id])->first();
        return $order->delete();
    }
    public function checkExistPass($store_id, $old_pass)
    {
        $store_pass = $this->orderRepository->getPass($store_id);

        if (!Hash::check($old_pass, $store_pass)) {
            return false;
        }
        return true;
    }

}
