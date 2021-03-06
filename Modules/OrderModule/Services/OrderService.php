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

    public function createBrochureOrder($data)
    {
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $rega_price = 0;
        $cut_style_price = 0;
        $shipping_fees = 0;

        // ***************************************************paper size,count & price***********************************************************************
        $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $total_standard_sheets = $data['quantity'] / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price) * $total_standard_sheets; // حساب ثمن الورق كله


        // $paper_size = $this->paperSizeService->findOne($request['paper_size']); // get chosen size data 
        // $total_per_print_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الفرخ الواحد
        // $total_number_of_sheets = $request['quantity'] / $total_per_print_sheet; // عدد الافرخ(1/4) المستخدمة
        // if (is_float($total_number_of_sheets) == 'true') {
        //     $total_number_of_sheets = floor($request['quantity'] / $total_per_print_sheet) + 1;
        // }
        // // dd($paper_size);
        // $paper_type = $this->paperTypeService->findOne($request['paper_type']); // معرفة نوع الورق
        // $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        // $total_sheets_price =  ($standard_sheet_price / 4) * $total_number_of_sheets; // حساب ثمن الورق كله

        // تحديد عدد الزنجات
        // $color_data = $this->colorsService->findOne($request['colors']);
        // dd($color_data);
        // ***************************************************zinkat & traj***********************************************************************
        $total_per_quarter_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الربع فرخ الواحد
        $total_number_of_quarter_sheets =  $data['quantity'] / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة

        if ($data['print_option'] == 1) { // وجه 
            $zinkat = $data['colors'] * 30;
            $traj =  1 * $data['colors'] * 30; // التراج 
            if ($total_number_of_quarter_sheets > 1000) {
                // $is_float= is_float($total_number_of_sheets / 1000);
                // if($is_float){

                //     $pull_nu = floor($total_number_of_sheets / 1000) + 1;
                // }
                $pull_nu_sheet = floor($total_number_of_quarter_sheets / 1000);
                $pull_nu_quantity = $data['quantity'] / 1000;
                // dd($pull_nu_quantity);
                $traj =  $pull_nu_sheet * $data['colors'] * 30; // التراج 
                if (is_float($pull_nu_quantity) == 'true') {
                    $rega = (floor($pull_nu_quantity) + 1) * 25;
                    // dd($rega);
                }
                $rega =  $pull_nu_quantity * 25;
            }
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat = $data['colors'] * 30 * 2;
            if ($total_number_of_quarter_sheets > 1000) {
                $is_float = $total_number_of_quarter_sheets / 1000;
                if ($is_float == "true") {
                    $pull_nu_sheet = floor($total_number_of_quarter_sheets / 1000) + 1;
                } else {
                    $pull_nu_sheet = floor($total_number_of_quarter_sheets / 1000);
                }

                $pull_nu_quantity = $data['quantity'] / 1000;
                $traj = 2 * $pull_nu_sheet * $data['colors'] * 30; // التراج 
                $rega = 2 * $pull_nu_quantity * 25;
                // dd( 2 .'*'. $pull_nu .'*'. $request->colors .'* 30');
                // dd($traj);
            } else {

                $traj =  2 * $data['colors'] * 30;
            }
        }

        // الشحن
        $shipping_fees = 20;
        if ($total_number_of_quarter_sheets > 1000) {
            $is_float = $total_number_of_quarter_sheets / 1000;
            if ($is_float == "true") {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000) + 1;
                // dd($over_1000);
            } else {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000);
            }
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000 - 1);
        }

        // اجمالي الطلب
        $total_order_price = $total_sheets_price + $zinkat + $traj + $shipping_fees;

        // create order


        //update order and add order_nu

        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                'ريجة' => $rega_price,
                'القص' => $cut_style_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }

    public function createLargeFolder($data)
    {
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
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $total_standard_sheets = $data['quantity'] / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price) * $total_standard_sheets; // حساب ثمن الورق كله

        // ***************************************************zinkat & traj***********************************************************************
        $total_per_quarter_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الربع فرخ الواحد
        $total_number_of_quarter_sheets =  $data['quantity'] / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        $pull_nu = $total_number_of_quarter_sheets / 1000;

        // dd($pull_nu);
        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * 30; //سعر الزنكات

            if (is_float($pull_nu) == 'true') {
                $pull_nu_sheet = floor($pull_nu) + 1; // عدد السحبات
            } else {
                $pull_nu_sheet = $pull_nu;
            }
            // dd($pull_nu_sheet);
            // dd($pull_nu_sheet%1000); 
            if (($total_number_of_quarter_sheets % 1000) > 100) {
                $traj_price = $pull_nu_sheet * $data['frontcolors'] * 30; //سعر التراج 
            }
            // dd($pull_nu_sheet .'*'. $data['frontcolors'] .'*'. 30);
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * 30; // سعر الزنكات

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
        // بحسب عدد الافرخ الربع و اضربه في السعر على 4

        if (is_float($total_standard_sheets) == 'true') {
            if ($data['covers'] == 2) {
                $cover_price =  (floor($total_standard_sheets) + 1) * 1.36 * 2;
            } else {
                $cover_price = (floor($total_standard_sheets) + 1) * 1.36;
            }
        } else {
            if ($data['covers'] == 2) {
                $cover_price = ($total_standard_sheets) * 1.36 * 2;
            } else {
                $cover_price = ($total_standard_sheets) * 1.36;
            }
        }
        // dd($cover_price);

        // ***************************************************rega***********************************************************************
        // dd($data['cutStyle'] == 2);
        if ($data['option'] == 'rega') { //if user choose "rega"
            if (is_float($data['quantity'] / 1000) == 'true') {
                $rega_nu = floor($data['quantity'] / 1000) + 1; // عدد الريجة المستخدمة لكل 1000 من العدد
                if ($data['cutStyle'] == 2) {
                    // dd('66');
                    $cut_style_price =  (floor($data['quantity'] / 1000) + 1) * 10;
                    $cut_style_price =  $rega_nu * 10;
                    // dd($cut_style_price);
                }
            } else {
                $rega_nu = $data['quantity'] / 1000;
            }
            $rega_price = $rega_nu * $data['rega'] * 25; // عدد الريجة لكل 1000 * عدد الريجات المختارة * السعر

            // dd($cut_style_price);
            if ($data['cutStyle'] == 2) {
                // dd('66');
                $cut_style_price =  (floor($data['quantity'] / 1000) + 1) * 10;
                $cut_style_price =  $rega_nu * 10;
                // dd($cut_style_price);
            }
        }


        // ***************************************************fold(taksir)***********************************************************************

        elseif ($data['option'] == 'fold') {
            // dd($data['cutStyle']);
            if (is_float($total_number_of_quarter_sheets / 1000) == 'true') { // عدد تراج التكسير لكل 1000
                $fold_traj_nu = floor($total_number_of_quarter_sheets / 1000) + 1;
            }
            $fold_traj_nu = floor($total_number_of_quarter_sheets / 1000);

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
        if ($total_number_of_quarter_sheets > 1000) {
            $is_float = $total_number_of_quarter_sheets / 1000;
            if ($is_float == "true") {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000) + 1;
                // dd($over_1000);
            } else {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000);
            }
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000 - 1);
        }
        // ***************************************************total***********************************************************************

        $total_order_price =
            $total_sheets_price + $zinkat_price + $traj_price + $cover_price + $rega_price + $fold_traj_price + $cut_style_price + $glue_price + $shipping_fees;
        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
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

    public function createFlyer($data)
    {
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $rega_price = 0;
        $cut_style_price = 0;
        $shipping_fees = 0;


        // ***************************************************paper size,count & price***********************************************************************
        $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $total_standard_sheets = $data['quantity'] / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price) * $total_standard_sheets; // حساب ثمن الورق كله


        // ***************************************************zinkat & traj***********************************************************************
        $total_per_quarter_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الربع فرخ الواحد
        $total_number_of_quarter_sheets =  $data['quantity'] / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        $pull_nu = $total_number_of_quarter_sheets / 1000;

        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * 30; //سعر الزنكات
            $traj_price = $pull_nu * $data['frontcolors'] * 30; //سعر التراج 
            // dd($pull_nu_sheet .'*'. $data['frontcolors'] .'*'. 30);
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * 30; // سعر الزنكات
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

        // ***************************************************rega***********************************************************************
        if ($data['cutStyle'] == 2) {
            // $rega_nu = ($data['quantity'] / 1000);

            $total_cuts = floor($data['quantity'] / 1000);

            $cut_style_price =  (floor($data['quantity'] / 1000) + 1) * 10;
            $cut_style_price =  $total_cuts * 10;
        }
        // dd( $data['rega'] != null);
        // if ( $data['rega'] != null) { //if user choose "rega"
        //     if (is_float($total_number_of_quarter_sheets / 1000) == 'true') {
        //         $rega_nu = floor($data['quantity'] / 1000) + 1; // عدد الريجة المستخدمة لكل 1000 من العدد
        //         if ($data['cutStyle'] == 2) {
        //             $cut_style_price =  (floor($data['quantity'] / 1000) + 1) * 10;
        //             $cut_style_price =  $rega_nu * 10;
        //         }
        //     } else {
        //         $rega_nu = $data['quantity'] / 1000;
        //     }
        //     $rega_price = $rega_nu * $data['rega'] * 25; // عدد الريجة لكل 1000 * عدد الريجات المختارة * السعر

        // ***************************************************shipping***********************************************************************

        $shipping_fees = 20;
        if ($total_number_of_quarter_sheets > 1000) {
            $is_float = $total_number_of_quarter_sheets / 1000;
            if ($is_float == "true") {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000) + 1;
                // dd($over_1000);
            } else {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000);
            }
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000 - 1);
        }

        // ***************************************************total***********************************************************************

        $total_order_price =
            $total_sheets_price + $zinkat_price + $traj_price  + $cut_style_price  + $shipping_fees;
        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                'ريجة' => $rega_price,
                'القص' => $cut_style_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }

    public function createLetterhead($data)
    {
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $rega_price = 0;
        $cut_style_price = 0;
        $shipping_fees = 0;


        // ***************************************************paper size,count & price***********************************************************************
        $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $total_standard_sheets = $data['quantity'] / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price) * $total_standard_sheets; // حساب ثمن الورق كله


        // ***************************************************zinkat & traj***********************************************************************
        $total_per_quarter_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الربع فرخ الواحد
        $total_number_of_quarter_sheets =  $data['quantity'] / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        $pull_nu = $total_number_of_quarter_sheets / 1000;

        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * 30; //سعر الزنكات
            $traj_price = $pull_nu * $data['frontcolors'] * 30; //سعر التراج 
            // dd($pull_nu_sheet .'*'. $data['frontcolors'] .'*'. 30);
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * 30; // سعر الزنكات
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

        // ***************************************************rega & cut style***********************************************************************
        if ($data['cutStyle'] == 2) {
            $rega_nu = ($data['quantity'] / 1000);
            if (is_float($total_number_of_quarter_sheets / 1000) == 'true') {
                $rega_nu = floor($data['quantity'] / 1000) + 1;
            }
            $cut_style_price =  (floor($data['quantity'] / 1000) + 1) * 10;
            $cut_style_price =  $rega_nu * 10;
        }
        // dd( $data['rega'] != null);
        // if ( $data['rega'] != null) { //if user choose "rega"
        //     if (is_float($total_number_of_quarter_sheets / 1000) == 'true') {
        //         $rega_nu = floor($data['quantity'] / 1000) + 1; // عدد الريجة المستخدمة لكل 1000 من العدد
        //         if ($data['cutStyle'] == 2) {
        //             $cut_style_price =  (floor($data['quantity'] / 1000) + 1) * 10;
        //             $cut_style_price =  $rega_nu * 10;
        //         }
        //     } else {
        //         $rega_nu = $data['quantity'] / 1000;
        //     }
        //     $rega_price = $rega_nu * $data['rega'] * 25; // عدد الريجة لكل 1000 * عدد الريجات المختارة * السعر

        // ***************************************************shipping***********************************************************************

        $shipping_fees = 20;
        if ($total_number_of_quarter_sheets > 1000) {
            $is_float = $total_number_of_quarter_sheets / 1000;
            if ($is_float == "true") {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000) + 1;
                // dd($over_1000);
            } else {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000);
            }
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000 - 1);
        }

        // ***************************************************total***********************************************************************

        $total_order_price =
            $total_sheets_price + $zinkat_price + $traj_price  + $cut_style_price  + $shipping_fees;
        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                // 'ريجة' => $rega_price,
                'القص' => $cut_style_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }

    public function createSticker($data)
    {
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $shipping_fees = 0;


        // ***************************************************paper size,count & price***********************************************************************
        $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $total_standard_sheets = $data['quantity'] / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price) * $total_standard_sheets; // حساب ثمن الورق كله


        // ***************************************************zinkat & traj***********************************************************************
        $total_per_quarter_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الربع فرخ الواحد
        $total_number_of_quarter_sheets =  $data['quantity'] / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        $pull_nu = $total_number_of_quarter_sheets / 1000;

        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * 30; //سعر الزنكات
            $traj_price = $pull_nu * $data['frontcolors'] * 30; //سعر التراج 
            // dd($pull_nu_sheet .'*'. $data['frontcolors'] .'*'. 30);
        }

        // ***************************************************shipping***********************************************************************

        $shipping_fees = 20;
        if ($total_number_of_quarter_sheets > 1000) {
            $is_float = $total_number_of_quarter_sheets / 1000;
            if ($is_float == "true") {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000) + 1;
                // dd($over_1000);
            } else {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000);
            }
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000 - 1);
        }

        // ***************************************************total***********************************************************************

        $total_order_price =
            $total_sheets_price + $zinkat_price + $traj_price  +  $shipping_fees;
        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                // 'ريجة' => $rega_price,
                // 'القص' => $cut_style_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }
    //لسة
    public function createBlocknote($data)
    {
        $total_sheets_price = 0;
        $total_cover_paper_price = 0;
        $cut_style_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $shipping_fees = 0;

        // ***************************************************paper size,count & price***********************************************************************
        $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $total_standard_sheets = ($data['quantity'] * $data['inner_quantity']) / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price) * $total_standard_sheets; // حساب ثمن الورق كله

        // ***************************************************cover paper price***********************************************************************
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $cover_paper_type = $this->paperTypeService->findOne($data['cover_paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_used_sheets = ($data['quantity'] * 2) / $total_per_full_sheet;
        $total_cover_paper_price =  ($standard_sheet_price) * $total_used_sheets; // حساب ثمن الغلاف

        // ***************************************************zinkat & traj***********************************************************************
        $total_per_quarter_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الربع فرخ الواحد
        $total_number_of_quarter_sheets =  ($data['quantity'] * $data['inner_quantity']) / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        $pull_nu = $total_number_of_quarter_sheets / 1000;
        if (is_float($pull_nu) == 'true') {
            $pull_nu_sheet = floor($pull_nu) + 1; // عدد السحبات
        } else {
            $pull_nu_sheet = $pull_nu;
        }
        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * 30; //سعر الزنكات
            $traj_price = $pull_nu_sheet * $data['frontcolors'] * 30; //سعر التراج 
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * 30; // سعر الزنكات
            
            $traj_price = $pull_nu_sheet * ($data['frontcolors'] + $data['backcolors']) * 30; // سعر التراج 
        }
        // *************************************************** finish option/direction ***********************************************************************

        if ($data['finish_option'] == 1 || $data['finish_option'] == 2) {
            $finish_price = $data['quantity'] * 1;
        } else {
            $finish_direction = $data['finish_dir'];
            if ($finish_direction == 1 || $finish_direction == 2) {
                $length = $paper_size->width;
                $is_length_fraction = $length - floor($length);
                if ($is_length_fraction > 0 == true) {
                    $finish_price = floor($length) + 1;
                } else {
                    $finish_price = floor($length);
                }
            } elseif ($finish_direction == 3 || $finish_direction == 4) {
                $length = $paper_size->height;
                $is_length_fraction = $length - floor($length);
                if ($is_length_fraction > 0 == true) {
                    $finish_price = floor($length) + 1;
                } else {
                    $finish_price = floor($length);
                }
            }
        }
        // ***************************************************cut style***********************************************************************
        if ($data['cutStyle'] == 2) {
            // $rega_nu = ($data['quantity'] / 1000);

            $total_cuts = floor($data['quantity'] / 1000);

            $cut_style_price =  (floor($data['quantity'] / 1000) + 1) * 10;
            $cut_style_price =  $total_cuts * 10;
        }
        // ***************************************************shipping***********************************************************************

        $shipping_fees = 20;
        if ($total_number_of_quarter_sheets > 1000) {
            $is_float = $total_number_of_quarter_sheets / 1000;
            if ($is_float == "true") {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000) + 1;
                // dd($over_1000);
            } else {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000);
            }
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000 - 1);
        }

        // ***************************************************total***********************************************************************
        $total_order_price =
            $total_sheets_price + $total_cover_paper_price + $zinkat_price + $traj_price  + $finish_price + $cut_style_price + $shipping_fees;
        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
                'سعر الغلاف'=> $total_cover_paper_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                'التقفيل' => $finish_price,
                'القص' => $cut_style_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }

    public function createPrescription($data)
    {
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $cover_price = 0;
        $rega_price = 0;
        $fold_traj_price = 0;
        $cut_style_price = 0;
        $glue_price = 0;
        $zigzag_price = 0;
        $finish_price = 0;
        $shipping_fees = 0;

        // ***************************************************paper size,count & price***********************************************************************
        $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $total_standard_sheets = ($data['quantity'] * $data['inner_quantity']) / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price) * $total_standard_sheets; // حساب ثمن الورق كله

        // ***************************************************zinkat & traj***********************************************************************
        $total_per_quarter_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الربع فرخ الواحد
        $total_number_of_quarter_sheets =  $data['quantity'] / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        $pull_nu = $total_number_of_quarter_sheets / 1000;

        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * 30; //سعر الزنكات
            $traj_price = $pull_nu * $data['frontcolors'] * 30; //سعر التراج 
        }

        // *************************************************** finish option/direction ***********************************************************************
        //    دبوس/غراء
        $finish_price = $data['quantity'] * 1;

        // ***************************************************zigzag***********************************************************************
        if ($data['zigzag'] == 1) {
            if (is_float($data['quantity'] / 1000) == 'true') {
                $rega_nu = floor($data['quantity'] / 1000) + 1; // عدد الريجة المستخدمة لكل 1000 من العدد
            } else {
                $rega_nu = $data['quantity'] / 1000;
            }
            $zigzag_price = $rega_nu * 25; // عدد الريجة لكل 1000 * عدد الريجات المختارة * السعر
        }
        // ***************************************************shipping***********************************************************************

        $shipping_fees = 20;
        if ($total_number_of_quarter_sheets > 1000) {
            $is_float = $total_number_of_quarter_sheets / 1000;
            if ($is_float == "true") {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000) + 1;
                // dd($over_1000);
            } else {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000);
            }
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000 - 1);
        }

        // ***************************************************total***********************************************************************

        $total_order_price =
            $total_sheets_price + $zinkat_price + $traj_price + $finish_price + $zigzag_price +  $shipping_fees;
        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                'الشرشرة' => $zigzag_price,
                'التقفيل' => $finish_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }

    public function createEnvelope($data) // حساب الزنكات و التراجات
    {
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
        // $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        // $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        // $total_standard_sheets = $data['quantity'] / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price) * $data['quantity']; // حساب ثمن الورق كله
        // ***************************************************zinkat & traj***********************************************************************
        // $total_per_quarter_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الربع فرخ الواحد
        // $total_number_of_quarter_sheets =  $data['quantity'] / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        $pull_nu = $data['quantity'] / 1000;

        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * 30; //سعر الزنكات
            $traj_price = $pull_nu * $data['frontcolors'] * 30; //سعر التراج 
        }
        // ***************************************************shipping***********************************************************************

        $shipping_fees = 20;
        if ($data['quantity']  > 1000) {
            // $is_float = $data['quantity']  / 1000;
            $over_1000 = floor($data['quantity']  / 1000);
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000 - 1);
        }
        // ***************************************************total***********************************************************************

        $total_order_price =
            $total_sheets_price + $zinkat_price + $traj_price + $shipping_fees;
        $arr =
            [
                //  'عدد الافرخ الكاملة' => $total_standard_sheets,
                //  'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                //  'الشرشرة' => $zigzag_price,
                //  'التقفيل' => $finish_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }

    public function createCopybook($data)
    {
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $rega_price = 0;
        $cut_style_price = 0;
        $finish_price = 0;
        $zigzag_price = 0;
        $shipping_fees = 0;


        // ***************************************************paper size,count & price***********************************************************************
        $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $total_standard_sheets = $data['quantity'] / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price) * $total_standard_sheets; // حساب ثمن الورق كله


        // ***************************************************zinkat & traj***********************************************************************
        $total_per_quarter_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الربع فرخ الواحد
        $total_number_of_quarter_sheets =  $data['quantity'] / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        $pull_nu = $total_number_of_quarter_sheets / 1000;
        if (is_float($pull_nu) == 'true') {
            $pull_nu_sheet = floor($pull_nu) + 1; // عدد السحبات
        } else {
            $pull_nu_sheet = $pull_nu;
        }
        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * 30; //سعر الزنكات
            $traj_price = $pull_nu_sheet * $data['frontcolors'] * 30; //سعر التراج 
            // dd($pull_nu_sheet .'*'. $data['frontcolors'] .'*'. 30);
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * 30; // سعر الزنكات
            // dd($pull_nu);

            // dd($pull_nu_sheet);
            $traj_price = $pull_nu_sheet * ($data['frontcolors'] + $data['backcolors']) * 30; // سعر التراج 
            // dd($pull_nu_sheet . '*' . ($data['frontcolors'] . '+' . $data['backcolors']) . '* 30');
        }

        // ***************************************************zigzag***********************************************************************
        if ($data['zigzag'] == 1) {
            if (is_float($data['quantity'] / 1000) == 'true') {
                $rega_nu = floor($data['quantity'] / 1000) + 1; // عدد الريجة المستخدمة لكل 1000 من العدد
            } else {
                $rega_nu = $data['quantity'] / 1000;
            }
            $zigzag_price = $rega_nu * 25; // عدد الريجة لكل 1000 * عدد الريجات المختارة * السعر
        }

        // *************************************************** finish option/direction ***********************************************************************
        if ($data['zigzag'] == 1) {
            //    دبوس/غراء
            $finish_price = $data['quantity'] * 1;
        } else {
            if ($data['finish_option'] == 1 || $data['finish_option'] == 2) {
                $finish_price = $data['quantity'] * 1;
            } else {
                $finish_direction = $data['finish_dir'];
                if ($finish_direction == 1 || $finish_direction == 2) {
                    $length = $paper_size->width;
                    $is_length_fraction = $length - floor($length);
                    if ($is_length_fraction > 0 == true) {
                        $finish_price = floor($length) + 1;
                    } else {
                        $finish_price = floor($length);
                    }
                } elseif ($finish_direction == 3 || $finish_direction == 4) {
                    $length = $paper_size->height;
                    $is_length_fraction = $length - floor($length);
                    if ($is_length_fraction > 0 == true) {
                        $finish_price = floor($length) + 1;
                    } else {
                        $finish_price = floor($length);
                    }
                }
            }
            // ***************************************************shipping***********************************************************************

            $shipping_fees = 20;
            if ($total_number_of_quarter_sheets > 1000) {
                $is_float = $total_number_of_quarter_sheets / 1000;
                if ($is_float == "true") {
                    $over_1000 = floor($total_number_of_quarter_sheets / 1000) + 1;
                    // dd($over_1000);
                } else {
                    $over_1000 = floor($total_number_of_quarter_sheets / 1000);
                }
                // dd($over_1000);
                $shipping_fees += 10 * ($over_1000 - 1);
            }

            // ***************************************************total***********************************************************************

            $total_order_price =
                $total_sheets_price + $zinkat_price + $traj_price  + $zigzag_price + $finish_price  + $shipping_fees;
            $arr =
                [
                    'عدد الافرخ الكاملة' => $total_standard_sheets,
                    'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                    'سعر الفرخ' => $standard_sheet_price,
                    'سعر الافرخ المستخدمة' => $total_sheets_price,
                    'الزنكات' => $zinkat_price,
                    'التراجات' => $traj_price,
                    'الشرشرة' => $zigzag_price,
                    'التقفيل' => $finish_price,
                    'الشحن' => $shipping_fees,
                    'اجمالي' => $total_order_price,
                ];
            dd($arr);
        }
    }
}
