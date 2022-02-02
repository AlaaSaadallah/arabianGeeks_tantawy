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
                $pull_nu_quantity = $request['quantity'] / 1000;
                // dd($pull_nu_quantity);
                $traj =  $pull_nu_sheet * $request['colors'] * 30; // التراج 
                if (is_float($pull_nu_quantity) == 'true') {
                    $rega = (floor($pull_nu_quantity) + 1) * 25;
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

                $pull_nu_quantity = $request['quantity'] / 1000;
                $traj = 2 * $pull_nu_sheet * $request['colors'] * 30; // التراج 
                $rega = 2 * $pull_nu_quantity * 25;
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


    public function createLargeFolder($data)
    {
        if ($data['paper_size'] = 7) {
            $total_number_of_sheets = $data['quantity'] / 1000;

            $n = 5;
        } else {
            $n = 4;
        }
        // dd($data);
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $cover_price = 0;
        $rega_price = 0;
        $fold_traj_price = 0;
        $cut_style_price = 0;
        $glue_price = 0;
        $shipping_fees = 0;

        // ***************************************************paper size,count & price***********************************************************************
        $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        $total_per_print_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الفرخ الواحد
        // $total_number_of_sheets = $data['quantity'] / $total_per_print_sheet; // عدد الافرخ(1/4) المستخدمة
        $total_number_of_sheets = $data['quantity'] / $n; // عدد الافرخ(1/4) المستخدمة

        // if (is_float($total_number_of_sheets) == 'true') { //لو عدد الافرخ decimal هنزود للاكبر
        //     $total_number_of_sheets = floor($data['quantity'] / $total_per_print_sheet) + 1;
        // }

        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price / $n) * $total_number_of_sheets; // حساب ثمن الورق كله
        if ($data['paper_size'] = 7) {
            $total_sheets_price =  ($standard_sheet_price) * $total_number_of_sheets; // حساب ثمن الورق كله
        }
        // ***************************************************zinkat & traj***********************************************************************
        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * 30; //سعر الزنكات
            if ($data['paper_size'] = 7) {
                $pull_nu = $data['quantity'] / 1000;
            } else {
            $pull_nu = $total_number_of_sheets / 1000;
            // dd($pull_nu);
            }
            if (is_float($pull_nu == 'true')) {
                $pull_nu_sheet = floor($pull_nu) + 1; // عدد السحبات
            } else {
                $pull_nu_sheet = $pull_nu;
            }
            $traj_price = $pull_nu_sheet * $data['frontcolors'] * 30; //سعر التراج 
// dd($pull_nu_sheet .'*'. $data['frontcolors'] .'*'. 30);
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * 30; // سعر الزنكات
            if ($data['paper_size'] = 7) {
                $pull_nu = $data['quantity'] / 1000;
            } else {

                $pull_nu = $total_number_of_sheets / 1000;
            }
            // dd($pull_nu);
            if (is_float($pull_nu) == 'true') {
                $pull_nu_sheet = floor($pull_nu) + 1; // عدد السحبات
            } else {
                $pull_nu_sheet = $pull_nu;
            }
            // dd($pull_nu_sheet);
            $traj_price = $pull_nu_sheet * ($data['frontcolors'] + $data['backcolors']) * 30; // سعر التراج 
            // dd($pull_nu_sheet . '*' . ($data['frontcolors'] . '+' . $data['backcolors']) . '* 30');
        }

        // ***************************************************cover(solovan)***********************************************************************
        // بحسب عدد الافرخ الربع و اضره في السعر على 4

        if (is_float($total_number_of_sheets / $n) == 'true') {
            if ($data['covers'] == 2) {
                $cover_price =  (floor($total_number_of_sheets / $n) + 1) * 1.36 * 2;
            } else {
                $cover_price = (floor($total_number_of_sheets / $n) + 1) * 1.36;
            }
        } else {
            if ($data['covers'] == 2) {
                if ($data['paper_size'] = 7) {
                    $cover_price = ($total_number_of_sheets ) * 1.36;
                }else{
                $cover_price =  (floor($total_number_of_sheets / $n) + 1) * 1.36 * 2;
                }
            } else {
                if ($data['paper_size'] = 7) {
                    $cover_price = ($total_number_of_sheets ) * 1.36;
                }else{

                    $cover_price = ($total_number_of_sheets / $n) * 1.36;
                }
            }
        }
        // dd($cover_price);

        // ***************************************************rega***********************************************************************

        if ($data['option'] == 'rega') { //if user choose "rega"
            if (is_float($data['quantity'] / 1000) == 'true') {
                $rega_nu = floor($data['quantity'] / 1000) + 1; // عدد الريجة المستخدمة لكل 1000 من العدد
                if ($data['cutStyle'] == 2) {
                    $cut_style_price =  (floor($data['quantity'] / 1000) + 1) * 10;
                    $cut_style_price =  $rega_nu * 10;
                }
              
            } else {
                $rega_nu = $data['quantity'] / 1000;
            }
            $rega_price = $rega_nu * $data['rega'] * 25; // عدد الريجة لكل 1000 * عدد الريجات المختارة * السعر
           
            // dd($cut_style_price);

        }

        // ***************************************************fold(taksir)***********************************************************************

        elseif ($data['option'] == 'fold') {
            // dd($data['cutStyle']);
            if (is_float($total_number_of_sheets / 1000) == 'true') { // عدد تراج التكسير لكل 1000
                $fold_traj_nu = floor($total_number_of_sheets / 1000) + 1;
            }
            $fold_traj_nu = floor($total_number_of_sheets / 1000);

            $fold_traj_price = $fold_traj_nu * 75; // سعر التكسير

            {
                if ($data['glue'] == 2) // لزق خارجي
                {
                    $glue_price = $data['quantity'] * 45;
                } else {

                    $glue_price = $data['quantity'] * 0.15;
                }
            }
        }

        // ***************************************************shipping***********************************************************************

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
        // ***************************************************total***********************************************************************

        $total_order_price =
            $total_sheets_price + $zinkat_price + $traj_price + $cover_price + $rega_price + $fold_traj_price + $cut_style_price + $glue_price + $shipping_fees;
        $arr =
            [
                'عدد الافرخ الربع' => $total_number_of_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ الربع' => $total_sheets_price,
                ' عدد الطباعة للفرخ الواحد الربع' => $total_per_print_sheet,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                'السلوفان' => $cover_price,
                'ريجة' => $rega_price,
                'القص' => $cut_style_price,
                'التكسير' => $fold_traj_price,
                'اللزق' => $glue_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }
}
