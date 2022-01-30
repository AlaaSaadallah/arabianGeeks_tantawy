<?php

namespace Modules\OrderModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\Hash;
use Modules\MaterialModule\Services\ColorsService;
use Modules\MaterialModule\Services\PaperSizeService;
use Modules\MaterialModule\Services\PaperTypeService;
use Modules\OrderModule\Repository\OrderRepository;

class OrderService
{
    private $orderRepository;
    use UploaderHelper;
    public function __construct(
        OrderRepository $orderRepository,
        // ColorsService $colorsService,
        PaperSizeService $paperSizeService,
        PaperTypeService $paperTypeService
        
    ) {
        // $this->colorsService = $colorsService;

        $this->paperSizeService = $paperSizeService;
        $this->paperTypeService = $paperTypeService;
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
        return $this->orderRepository->create($requests);
    }

    public function update($data)
    {
        return $this->orderRepository->update($data, $data['id']);
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
        $paper_size = $this->paperSizeService->findOne($request['paper_size']); // get chosen size data 
        $total_per_print_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الفرخ الواحد
        $total_number_of_sheets = $request['quantity'] / $total_per_print_sheet; // عدد الافرخ(1/4) المستخدمة
        if (is_float($total_number_of_sheets) == 'true') {
            $total_number_of_sheets = floor($request['quantity'] / $total_per_print_sheet) + 1;
        }
        // dd($paper_size);
        $paper_type = $this->paperTypeService->findOne($request['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price / 4) * $total_number_of_sheets; // حساب ثمن الورق كله

        // تحديد عدد الزنجات
        // $color_data = $this->colorsService->findOne($request['colors']);
        // dd($color_data);
        if ($request['print_option'] == 1) { // وجه 
            $zinkat = $request['colors'] * 30;
            $traj =  1 * $request['colors'] * 30; // التراج 
            if ($total_number_of_sheets > 1000) {
                // $is_float= is_float($total_number_of_sheets / 1000);
                // if($is_float){

                //     $pull_nu = floor($total_number_of_sheets / 1000) + 1;
                // }
                $pull_nu_sheet = floor($total_number_of_sheets / 1000);
                $pull_nu_quantity = $request['quantity'] / 1000 ;
                // dd($pull_nu_quantity);
                $traj =  $pull_nu_sheet * $request['colors'] * 30; // التراج 
                if(is_float($pull_nu_quantity) == 'true'){
                    $rega = (floor($pull_nu_quantity)+1) * 25 ;
                    // dd($rega);
                }
                $rega =  $pull_nu_quantity * 25;
            }
        } elseif ($request['print_option'] == 2) { //  وجه و ضهر
            $zinkat = $request['colors'] * 30 * 2;
            if ($total_number_of_sheets > 1000) {
                $is_float = $total_number_of_sheets / 1000;
                if ($is_float == "true") {
                    $pull_nu_sheet = floor($total_number_of_sheets / 1000) + 1;
                } else {
                    $pull_nu_sheet = floor($total_number_of_sheets / 1000);
                }

                $pull_nu_quantity = $request['quantity'] / 1000 ;
                $traj = 2 * $pull_nu_sheet * $request['colors'] * 30; // التراج 
                $rega = 2* $pull_nu_quantity * 25;
                // dd( 2 .'*'. $pull_nu .'*'. $request->colors .'* 30');
                // dd($traj);
            } else {

                $traj =  2 * $request['colors'] * 30;
            }
        }

        // الشحن
        $shipping_fees = 20;
        if ($total_number_of_sheets > 1000) {
            $is_float = $total_number_of_sheets / 1000;
            if ($is_float == "true") {
                $over_1000 = floor($total_number_of_sheets / 1000) + 1;
                // dd($over_1000);
            } else {
                $over_1000 = floor($total_number_of_sheets / 1000);
            }
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000 - 1);
        }

        // اجمالي الطلب
        $total_order_price = $total_sheets_price + $zinkat + $traj + $shipping_fees;

        // create order


        //update order and add order_nu


        $arr = [
            'عدد الافرخ الربع' => $total_number_of_sheets,
            'سعر الفرخ' => $standard_sheet_price,
            'سعر الافرخ الربع' => $total_sheets_price,
            ' عدد الطباعة للفرخ الواحد الربع' => $total_per_print_sheet,
            'الزنكات' => $zinkat,
            'التراجات' => $traj,
            'الشحن' => $shipping_fees,
            'اجمالي' => $total_order_price,


        ];
        dd($arr);
    }
}
