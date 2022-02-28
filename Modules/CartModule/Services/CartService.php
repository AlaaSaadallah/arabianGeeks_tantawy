<?php

namespace Modules\CartModule\Services;

use App\Helpers\UploaderHelper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\CartModule\Repository\CartItemRepository;
use Modules\CartModule\Repository\CartRepository;
use Modules\CategoryModule\Services\CategoryService;
use Modules\MaterialModule\Entities\PrintOption;
use Modules\MaterialModule\Services\CoverService;
use Modules\MaterialModule\Services\CutStyleService;
use Modules\MaterialModule\Services\PaperSizeService;
use Modules\MaterialModule\Services\PaperTypeService;
use Modules\MaterialModule\Services\PrintOptionService;
use Modules\ProductModule\Repository\ProductRepository;

class CartService
{

    private $cartRepository;
    use UploaderHelper;

    public function __construct(
        CartRepository $cartRepository,
        PaperSizeService $paperSizeService,
        PaperTypeService $paperTypeService,
        CategoryService $categoryService,
        PrintOptionService $printOptionService,
        CutStyleService $cutStyleService,
        CoverService $coverService
    ) {
        $this->cartRepository = $cartRepository;
        $this->paperSizeService = $paperSizeService;
        $this->paperTypeService = $paperTypeService;
        $this->categoryService = $categoryService;
        $this->printOptionService = $printOptionService;
        $this->cutStyleService = $cutStyleService;
        $this->coverService = $coverService;
    }

    public function createBrochureOrder($data) //done
    {
        // dd($data);
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $rega_price = 0;
        $cut_style_price = 0;
        $cover_price = 0;
        $shipping_fees = 0;
        
        $category = $this->categoryService->findOne($data['cat_id']);
        // ***************************************************Image***********************************************************************
        $imgName = null;
        ///////Upload Image////////
        if ($data->hasFile('image')) {
            $imgName = $this->uploadImage($data->file('image'), 'cart', 'brochure');
        }

        $data = $data->all();
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
        // dd($total_number_of_quarter_sheets/1000);
        if (is_float($total_number_of_quarter_sheets / 1000)) {
            $total_number_of_quarter_sheets = 1000 * (floor($total_number_of_quarter_sheets / 1000) + 1);
        }

        $print_option = $this->printOptionService->findOne($data['print_option']);
        if ($data['print_option'] == 1) { // وجه 
            $zinkat_price = $data['frontcolors'] * 30;
            $traj_price =  1 * $data['frontcolors'] * 30; // التراج 
            // dd($total_number_of_quarter_sheets);
            if ($total_number_of_quarter_sheets > 1000) {
                $pull_nu_sheet = floor($total_number_of_quarter_sheets / 1000);
                $pull_nu_quantity = $data['quantity'] / 1000;
                // dd($pull_nu_quantity);
                $traj_price =  $pull_nu_sheet * $data['frontcolors'] * 30; // التراج 
            }
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * 30;
            if ($total_number_of_quarter_sheets > 1000) {
                $is_float = $total_number_of_quarter_sheets / 1000;
                if ($is_float == "true") {
                    $pull_nu_sheet = floor($total_number_of_quarter_sheets / 1000) + 1;
                } else {
                    $pull_nu_sheet = floor($total_number_of_quarter_sheets / 1000);
                }

                $pull_nu_quantity = $data['quantity'] / 1000;
                // dd($pull_nu_sheet);
                $traj_price =  $pull_nu_sheet * ($data['frontcolors'] + $data['backcolors']) * 30; // التراج 
                // $rega_price = 2 * $pull_nu_quantity * 25;
                // dd( 2 .'*'. $pull_nu .'*'. $request->colors .'* 30');
                // dd($traj);
            } else {

                $traj_price =  2 * ($data['frontcolors'] + $data['backcolors']) * 30;
            }
        }
        // ***************************************************rega***********************************************************************

        $cutStyle = $this->cutStyleService->findOne($data['cutStyle']);
        if ($data['rega'] != null) { //if user choose "rega"
            // if (is_float($total_number_of_quarter_sheets / 1000) == 'true') {
                $rega_nu = $data['quantity'] / 1000;
                // $rega_nu = floor($data['quantity'] / 1000) + 1; // عدد الريجة المستخدمة لكل 1000 من العدد
            if ($data['cutStyle'] == 2) {
                $cut_style_price =  (floor($data['quantity'] / 1000) + 1) * 10;
                $cut_style_price =  $rega_nu * 10;
                // }
            }
            $rega_price = $rega_nu * $data['rega'] * 25; // عدد الريجة لكل 1000 * عدد الريجات المختارة * السعر
        } else {
            if ($data['cutStyle'] == 2) {
                $cut_style_price =  (floor($data['quantity'] / 1000) + 1) * 10;
                // $cut_style_price =  $rega_nu * 10;
                // }
            }
        }
        // ***************************************************cover(solovan)***********************************************************************
        // بحسب عدد الافرخ الربع و اضربه في السعر على 4

        if ($data['covers'] != null) {
            $solovan = $this->coverService->findOne($data['covers']);
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
        }
        // ***************************************************shipping***********************************************************************
        // dd('p');
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
        $total_order_price = $total_sheets_price + $zinkat_price + $traj_price + $cover_price + $shipping_fees;

        // create order

        // dd('5');
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
                'السوليفان' => $cover_price,
                'القص' => $cut_style_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        // dd($arr);

        $cart_data = [
            'user_id' => 1,
            'image'=>$imgName,
            'category' => (key_exists('cat_id', $data) && !empty($data['cat_id'])) ? $category->name : null,
            'paper_type' => (key_exists('paper_type', $data) && !empty($data['paper_type'])) ? $paper_type->name : null,
            'paper_size' => (key_exists('paper_size', $data) && !empty($data['paper_size'])) ? $paper_size->name : null,
            'quantity' => (key_exists('quantity', $data) && !empty($data['quantity'])) ? $data['quantity'] : null,
            'inner_quantity' => (key_exists('inner_quantity', $data) && !empty($data['inner_quantity'])) ? $data['inner_quantity'] : null,
            'print_option' => (key_exists('print_option', $data) && !empty($data['print_option'])) ? $print_option->name : null,
            'front_color' => (key_exists('frontcolors', $data) && !empty($data['frontcolors'])) ? $data['frontcolors'] : null,
            'back_color' => (key_exists('backcolors', $data) && !empty($data['backcolors'])) ? $data['backcolors'] : null,
            'cut_style' => (key_exists('cutStyle', $data) && !empty($data['cutStyle'])) ? $cutStyle->name : null,
            'rega' => (key_exists('rega', $data) && !empty($data['rega'])) ? $data['rega'] : null,
            'solovan' => (key_exists('covers', $data) && !empty($data['covers'])) ? $solovan->name : null,
            'cover_paper_type' => (key_exists('cover_paper_type', $data) && !empty($data['cover_paper_type'])) ? $data['cover_paper_type'] : null,
            'finish_option' => (key_exists('finish_option', $data) && !empty($data['finish_option'])) ? $data['finish_option'] : null,
            'finish_direction' => (key_exists('finish_dir', $data) && !empty($data['finish_dir'])) ? $data['finish_dir'] : null,
            'notes' => (key_exists('notes', $data) && !empty($data['notes'])) ? $data['notes'] : null,
            'shipping' => $shipping_fees,
            'total_price' => $total_order_price
        ];
        // dd($cart_data);

         return $this->cartRepository->create($cart_data);
       
    }

    public function createLargeFolder($data) //done
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
            } else if ($data['covers'] == 1) {
                $cover_price = (floor($total_standard_sheets) + 1) * 1.36;
            } else {
                $cover_price = 0;
            }
        } else {
            if ($data['covers'] == 2) {
                $cover_price = ($total_standard_sheets) * 1.36 * 2;
            } else if ($data['covers'] == 1) {
                $cover_price = ($total_standard_sheets) * 1.36;
            } else {
                $cover_price = 0;
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

            if ($data['outer_pocket_glue']) {
                $outer_pocket_glue = $data['quantity'] * 45;
            } else {
                $outer_pocket_glue = 0;
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
            $total_sheets_price + $zinkat_price + $traj_price + $cover_price + $rega_price + $fold_traj_price + $cut_style_price + $glue_price + $outer_pocket_glue + $shipping_fees;
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
                'لزق جيب خارجي' => $outer_pocket_glue,
                'التكسير' => $fold_traj_price,
                'اللزق' => $glue_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }

    public function createFlyer($data) //done
    {
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $rega_price = 0;
        $cover_price = 0;
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
        // ***************************************************cover(solovan)***********************************************************************
        // بحسب عدد الافرخ الربع و اضربه في السعر على 4
        // dd($data['covers']);
        if ($data['covers'] != null) {
            if (is_float($total_standard_sheets) == 'true') {
                if ($data['covers'] == 2) {
                    $cover_price =  (floor($total_standard_sheets) + 1) * 1.36 * 2;
                } else if ($data['covers'] == 1) {
                    $cover_price = (floor($total_standard_sheets) + 1) * 1.36;
                } else {
                    $cover_price = 0;
                }
            } else {
                if ($data['covers'] == 2) {
                    $cover_price = ($total_standard_sheets) * 1.36 * 2;
                } else if ($data['covers'] == 1) {
                    $cover_price = ($total_standard_sheets) * 1.36;
                } else {
                    $cover_price = 0;
                }
            }
        }
        // ***************************************************shipping***********************************************************************

        $shipping_fees = 20;
        if ($total_number_of_quarter_sheets > 1200) {
            $is_float = $total_number_of_quarter_sheets / 1000;
            if ($is_float == "true") {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000) + 1;
                // dd($over_1000);
            } else {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000);
            }
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000);
        }

        // ***************************************************total***********************************************************************

        $total_order_price =
            $total_sheets_price + $zinkat_price + $traj_price  + $cut_style_price  + $cover_price + $shipping_fees;
        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                'السوليفان' => $cover_price,
                'ريجة' => $rega_price,
                'القص' => $cut_style_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }

    public function createLetterhead($data) //done
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
        $pull_nu_sheet = $total_number_of_quarter_sheets / 1000;
        // dd(is_float($pull_nu_sheet));
        if (is_float($pull_nu_sheet) == 'true') {
            $pull_nu_sheet = (floor($pull_nu_sheet) + 1);
            // dd($rega);
        }
        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * 30; //سعر الزنكات
            $traj_price = $pull_nu_sheet * $data['frontcolors'] * 30; //سعر التراج 
            // dd($pull_nu_sheet . '*' . $data['frontcolors'] . '*' . 30);
        }

        // ***************************************************rega & cut style***********************************************************************
        if ($data['cutStyle'] == 2) {
            // $rega_nu = ($data['quantity'] / 1000);

            $total_cuts = floor($data['quantity'] / 1000);

            // $cut_style_price =  (floor($data['quantity'] / 1000) + 1) * 10;
            $cut_style_price =  $total_cuts * 10;
        }
        // ***************************************************shipping***********************************************************************

        $shipping_fees = 20;
        if ($total_number_of_quarter_sheets > 1000) {
            $is_float = is_float($total_number_of_quarter_sheets / 1000);
            if ($is_float == "true") {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000) + 1;
                // dd($over_1000);
            } else {
                $over_1000 = floor($total_number_of_quarter_sheets / 1000);
            }
            // dd($total_number_of_quarter_sheets/1000);
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
        $cut_price = 0;
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
        // ***************************************************cut number***********************************************************************

        if ($data['cut_number']) {

            $cut_price = $total_number_of_quarter_sheets * 1.5; //سعر التراج 
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
            $total_sheets_price + $zinkat_price + $traj_price + $cut_price +  $shipping_fees;
        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                // 'ريجة' => $rega_price,
                'القص' => $cut_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }

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
        // dd($pull_nu_sheet);
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
                // dd($is_length_fraction);
                if ($is_length_fraction > 0 == true) {
                    $finish_price = $data['quantity'] * (floor($length) + 1);
                } else {
                    $finish_price = $data['quantity'] * floor($length);
                }
                // dd($finish_price);
            } elseif ($finish_direction == 3 || $finish_direction == 4) {
                $length = $paper_size->height;
                $is_length_fraction = $length - floor($length);
                if ($is_length_fraction > 0 == true) {
                    $finish_price = $data['quantity'] * (floor($length) + 1);
                } else {
                    $finish_price = $data['quantity'] * floor($length);
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
        if (($total_number_of_quarter_sheets + (2 * $data['quantity'])) > 1000) {
            $is_float = ($total_number_of_quarter_sheets + (2 * $data['quantity'])) / 1000;
            if ($is_float == "true") {
                $over_1000 = floor(($total_number_of_quarter_sheets + (2 * $data['quantity'])) / 1000) + 1;
                // dd($over_1000);
            } else {
                $over_1000 = floor(($total_number_of_quarter_sheets + (2 * $data['quantity'])) / 1000);
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
                'سعر الغلاف' => $total_cover_paper_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                'التقفيل' => $finish_price,
                'القص' => $cut_style_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }

    public function createPrescription($data) // done
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
        $total_number_of_quarter_sheets =  ($data['quantity'] * $data['inner_quantity'])  / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        // dd($total_number_of_quarter_sheets);
        if (is_float(($total_number_of_quarter_sheets / 1000))) {
            // dd($data['quantity']);
            // dd((1000*(floor($data['quantity']/1000)+1)));
            $pull_nu = floor(($total_number_of_quarter_sheets / 1000) + 1);
            // $pull_nu = intval((((1000 * (floor($data['quantity'] / 1000) + 1)) * $data['inner_quantity']) / $total_per_quarter_sheet) / 1000);
            // dd(is_float($pull_nu));
            // dd($pull_nu);
        } else {
            $pull_nu = $total_number_of_quarter_sheets / 1000;
        }

        // dd($pull_nu);
        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * 30; //سعر الزنكات
            // dd($zinkat_price);
            $traj_price = $pull_nu * $data['frontcolors'] * 30; //سعر التراج 
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors'])  * 30; // سعر الزنكات

            $traj_price = $pull_nu * ($data['frontcolors'] + $data['backcolors']) * 30; // سعر التراج 
            // dd($pull_nu_sheet);
        }

        // *************************************************** finish option/direction ***********************************************************************
        //    دبوس/غراء
        $finish_price = $data['quantity'] * 1;

        // ***************************************************zigzag***********************************************************************
        //    dd($data['inner_quantity']);
        if ($data['zigzag'] == 1) {
            if (is_float(($data['quantity'] * $data['inner_quantity']) / 1000) == 'true') {
                $rega_nu = floor(($data['quantity'] * $data['inner_quantity']) / 1000) + 1; // عدد الريجة المستخدمة لكل 1000 من العدد
            } else {
                $rega_nu = ($data['quantity'] * $data['inner_quantity']) / 1000;
            }
            $zigzag_price = $rega_nu * 25; // عدد الريجة لكل 1000 * عدد الريجات المختارة * السعر
        }
        // ***************************************************shipping***********************************************************************

        $shipping_fees = 20;
        if ($total_number_of_quarter_sheets > 1000) {
            $is_float = $total_number_of_quarter_sheets / 1000;
            if (is_float($is_float) == "true") {
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
            $traj_price = $pull_nu * $data['frontcolors'] * 40; //سعر التراج 
        }
        // ***************************************************shipping***********************************************************************

        $shipping_fees = 20;
        if ($data['quantity']  > 1000) {
            // $is_float = $data['quantity']  / 1000;
            $over_1000 = floor($data['quantity'] / 1000);
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

    public function createMagazine($data) //done
    {
        // dd($data);
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $cover_price = 0;
        $cut_style_price = 0;
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
        $total_number_of_quarter_sheets =  ($data['quantity'] * $data['inner_quantity']) / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة


        if (is_float($data['quantity'] / 1000)) {
            // dd((1000*(floor($data['quantity']/1000)+1)));
            $pull_nu = intval((((1000 * (floor($data['quantity'] / 1000) + 1)) * $data['inner_quantity']) / $total_per_quarter_sheet) / 1000);
            // dd(is_float($pull_nu));
            // dd($pull_nu);
        } else {
            $pull_nu = $total_number_of_quarter_sheets / 1000;
        }

        // $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        // $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        // if ($data['with_cover'] == 1) {
        //     $total_standard_sheets = ($data['quantity'] * ($data['inner_quantity'] + 2)) / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        // } else {
        //     $total_standard_sheets = ($data['quantity'] * $data['inner_quantity']) / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        // }
        // $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        // $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        // $total_sheets_price =  ($standard_sheet_price) * $total_standard_sheets; // حساب ثمن الورق كله

        // // ***************************************************zinkat & traj***********************************************************************
        // $total_per_quarter_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الربع فرخ الواحد
        // $total_number_of_quarter_sheets =  $total_standard_sheets / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        // dd($total_standard_sheets .'/ '.$total_per_quarter_sheet);
        // $pull_nu = $total_number_of_quarter_sheets / 1000;


        $number_of_zinkat = $data['inner_quantity'] / $total_per_quarter_sheet;
        if (is_float($pull_nu)) {
            $pull_nu_sheet = floor($pull_nu) + 1; // عدد السحبات
        } else {
            $pull_nu_sheet = $pull_nu;
        }
        // dd($number_of_zinkat);
        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * $number_of_zinkat * 30; //سعر الزنكات



            if ($data['print_option'] == 1) {

                $traj_price = $pull_nu_sheet * $data['frontcolors'] * 30; //سعر التراج 
            }
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * $number_of_zinkat * 30; // سعر الزنكات

            $traj_price = $pull_nu_sheet * ($data['frontcolors'] + $data['backcolors']) * 30; // سعر التراج 
            // dd($pull_nu_sheet);
        }

        // ***************************************************cut style***********************************************************************
        if ($data['cutStyle'] == 2) {

            if (is_float($data['quantity'] / 1000)) {
                $quantity = floor($data['quantity'] / 1000) + 1;
            }
            $total_cuts = ($quantity * $data['inner_quantity']);
            //   dd($total_cuts);
            // if(is_float($total_cuts)){
            //     // dd(floor($total_cuts));
            //     $cut_style_price =  (floor($total_cuts) + 1)  * 10;

            // }else{

            $cut_style_price =  $total_cuts * 10;
            // }

        }

        // *************************************************** finish option/direction ***********************************************************************
        //    دبوس/غراء
        $inner_pages_price = ($data['inner_quantity'] * 0.05);

        $price_of_pins =  $inner_pages_price + 0.20;
        $finish_price = $data['quantity'] * $price_of_pins;
        //    dd($inner_pages_price + 0.20 );

        // ***************************************************shipping***********************************************************************

        $shipping_fees = 20;
        if ($total_number_of_quarter_sheets > 1000) {
            $is_float = $total_number_of_quarter_sheets / 1000;
            // dd($is_float);
            if (is_float($is_float) == "true") {
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
            $total_sheets_price + $zinkat_price + $traj_price + $finish_price + $cut_style_price +  $shipping_fees;
        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                'التقفيل' => $finish_price,
                'القص' => $cut_style_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        dd($arr);
    }
















public function findWhere($arr)
{
   return $this->cartRepository->findWhere($arr);
}
}
