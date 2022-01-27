<?php

namespace Modules\OrderModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Services\ColorService;
use Modules\MaterialModule\Services\PaperSizeService;
use Modules\MaterialModule\Services\PaperTypeService;
use Modules\OrderModule\Repository\OrderRepository;

class OrderService
{
    private $orderRepository;
    use UploaderHelper;
    public function __construct(OrderRepository $orderRepository,PaperSizeService $paperSizeService, PaperTypeService $paperTypeService, ColorService $colorService)
        {
            $this->paperSizeService = $paperSizeService;
            $this->paperTypeService = $paperTypeService;
            $this->colorService = $colorService;
        

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

    public function createBrochureOrder($request)
    {
        // dd($request);
        // if (key_exists('image', $user_data) && $user_data['image'] != null) {
            $img_name = $this->uploadImage($request['image'], 'orders', 'brochure', 200, 200);
            // dd($img_name);
                // $user_data['image'] = $img_name;
         
        $paper_size = $this->paperSizeService->findOne($request['paper_size']); // get chosen size data 
        $no_of_width_to_quarter = floor(48.5 / $paper_size->width); // العدد بالنسبة للعرض
        $no_of_height_to_quarter = floor(33.5 / $paper_size->height); //  العدد بالنسبه للطول
        $total_per_print_sheet =  $no_of_width_to_quarter * $no_of_height_to_quarter; // العدد الكلي في الفرخ الواحد
        $total_number_of_sheets = $request['quantity'] / $total_per_print_sheet; // عدد الافرخ(1/4) المستخدمة
        if(is_float($total_number_of_sheets) == 'true')
        {
            $total_number_of_sheets = floor($request['quantity'] / $total_per_print_sheet)+1;
        }
        $paper_type = $this->paperTypeService->findOne($request['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price / 4) * $total_number_of_sheets; // حساب ثمن الورق كله
        $color_data = $this->colorService->findOne($request['colors']); // معلومات اللون
        // تحديد عدد الزنجات
        if ($request['print_option'] == 1) { // وجه 1
            $zinkat = $request['colors'] * 30;
            $traj =  1 * $color_data->price; // التراج 
            if ($total_number_of_sheets > 1000) {
                $is_float= is_float($total_number_of_sheets / 1000);
                if($is_float){
                    
                    $pull_nu = floor($total_number_of_sheets / 1000) + 1;
                }
                $pull_nu = floor($total_number_of_sheets / 1000);

                $traj =  $pull_nu * $color_data->price; // التراج 
   
            }
        } elseif ($request['print_option'] == 2) { // 2 وجه و ضهر
            $zinkat = $request['colors'] * 30 * 2;
            $traj =  2 * $color_data->price; // التراج 

            if ($total_number_of_sheets > 1000) {
                $pull_nu = floor($total_number_of_sheets / 1000) + 1;
                $traj = 2* $pull_nu * $color_data->price; // التراج 
    
            }
        }
       
        // الشحن
        $shipping_fees = 20;
        if ($total_number_of_sheets > 1000) {
            $over_1000 = floor($total_number_of_sheets / 1000) + 1;
            $shipping_fees += 10;
        }

        // اجمالي الطلب
        $total_order_price = $total_sheets_price + $zinkat + $traj + $shipping_fees;


        $arr = [
            'عدد الافرخ الربع' => $total_number_of_sheets,
            'سعر الفرخ'=>$standard_sheet_price,
            'سعر الافرخ الربع'=>$total_sheets_price ,
            ' عدد الطباعة للفرخ الواحد الربع'=>$total_per_print_sheet,
            'الزنكات'=>$zinkat ,
            'التراجات'=>$traj ,
            'الشحن'=>$shipping_fees ,
            'اجمالي'=>$total_order_price,


        ];
        dd($arr);
    }

}
