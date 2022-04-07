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
use Modules\MaterialModule\Services\ConstantsService;
use Modules\MaterialModule\Services\CoverService;
use Modules\MaterialModule\Services\CutStyleService;
use Modules\MaterialModule\Services\FinishOptionService;
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
        CoverService $coverService,
        FinishOptionService $finishOptionService,
        ConstantsService $constantsService
    ) {
        $this->cartRepository = $cartRepository;
        $this->paperSizeService = $paperSizeService;
        $this->paperTypeService = $paperTypeService;
        $this->categoryService = $categoryService;
        $this->printOptionService = $printOptionService;
        $this->cutStyleService = $cutStyleService;
        $this->coverService = $coverService;
        $this->finishOptionService = $finishOptionService;
        $this->constantsService = $constantsService;
    }

    public function delete($id)
    {
        return $this->cartRepository->delete($id);
    }

    public function findAll()
    {
        return $this->cartRepository->all();
    }

    public function findOne($id)
    {
        return $this->cartRepository->find($id);
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
        $zinkat = $this->constantsService->findOne(1);
        $traj = $this->constantsService->findOne(2);
        // dd($zinkat->price, $trag->price);
        $print_option = $this->printOptionService->findOne($data['print_option']);
        if ($data['print_option'] == 1) { // وجه 
            $zinkat_price = $data['frontcolors'] * $zinkat->price;
            $traj_price =  1 * $data['frontcolors'] * $traj->price; // التراج 
            // dd($total_number_of_quarter_sheets);
            if ($total_number_of_quarter_sheets > 1000) {
                $pull_nu_sheet = floor($total_number_of_quarter_sheets / 1000);
                $pull_nu_quantity = $data['quantity'] / 1000;
                // dd($pull_nu_quantity);
                $traj_price =  $pull_nu_sheet * $data['frontcolors'] * $traj->price; // التراج 
            }
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            if ($data['frontcolors'] == $data['backcolors']) {
                // طبع و قلب
                $zinkat_price = ($data['frontcolors']) * $zinkat->price;
            } else {

                $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * $zinkat->price;
            }
            if ($total_number_of_quarter_sheets > 1000) {
                $is_float = $total_number_of_quarter_sheets / 1000;
                if ($is_float == "true") {
                    $pull_nu_sheet = floor($total_number_of_quarter_sheets / 1000) + 1;
                } else {
                    $pull_nu_sheet = floor($total_number_of_quarter_sheets / 1000);
                }

                $pull_nu_quantity = $data['quantity'] / 1000;
                // dd($pull_nu_sheet);
                $traj_price =  $pull_nu_sheet * ($data['frontcolors'] + $data['backcolors']) * $traj->price; // التراج 
                // $rega_price = 2 * $pull_nu_quantity * 25;
                // dd( 2 .'*'. $pull_nu .'*'. $request->colors .'* 30');
                // dd($traj);
            } else {

                $traj_price =  2 * ($data['frontcolors'] + $data['backcolors']) * $traj->price;
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
        $solovan_price = $this->constantsService->findOne(3);

        if ($data['covers'] != null) {
            $solovan = $this->coverService->findOne($data['covers']);
            if (is_float($total_standard_sheets) == 'true') {
                if ($data['covers'] == 2) {
                    $cover_price =  (floor($total_standard_sheets) + 1) * $solovan_price->price * 2;
                } else {
                    $cover_price = (floor($total_standard_sheets) + 1) * $solovan_price->price;
                }
            } else {
                if ($data['covers'] == 2) {
                    $cover_price = ($total_standard_sheets) * $solovan_price->price * 2;
                } else {
                    $cover_price = ($total_standard_sheets) * $solovan_price->price;
                }
            }
        }
        // ***************************************************shipping***********************************************************************
        $shipping_fees = auth()->guard('customer')->user()->city->shipping_price;
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
            'user_id' =>  auth()->guard('customer')->user()->id,
            'image' => $imgName,
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
        $outer_pocket_glue = 0;

        $category = $this->categoryService->findOne($data['cat_id']);
        $print_option = $this->printOptionService->findOne($data['print_option']);
        // ***************************************************Image***********************************************************************
        $imgName = null;
        ///////Upload Image////////
        if ($data->hasFile('image')) {
            $imgName = $this->uploadImage($data->file('image'), 'cart', 'folder');
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
        $pull_nu = $total_number_of_quarter_sheets / 1000;
        // dd($pull_nu);
        $zinkat = $this->constantsService->findOne(1);
        $traj = $this->constantsService->findOne(2);

        if ($data['print_option'] == 1) { //  وجه فقط
            // dd('5');
            $zinkat_price = $data['frontcolors'] * $zinkat->price; //سعر الزنكات

            if (is_float($pull_nu) == 'true') {
                $pull_nu_sheet = floor($pull_nu) + 1; // عدد السحبات
            } else {
                $pull_nu_sheet = $pull_nu;
            }
            // dd($pull_nu_sheet);
            // dd($pull_nu_sheet%1000); 
            if (($total_number_of_quarter_sheets % 1000) > 100) {
                $traj_price = $pull_nu_sheet * $data['frontcolors'] * $traj->price; //سعر التراج 
                //   dd($traj_price);
            } else {
                $traj_price = $pull_nu_sheet * $data['frontcolors'] * $traj->price; //سعر التراج 

            }
            // dd($pull_nu_sheet .'*'. $data['frontcolors'] .'*'. 30);
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * $zinkat->price; // سعر الزنكات

            if (is_float($pull_nu) == 'true') {
                $pull_nu_sheet = floor($pull_nu) + 1; // عدد السحبات
            } else {
                $pull_nu_sheet = $pull_nu;
            }
            // dd($pull_nu_sheet);
            $traj_price = $pull_nu_sheet * ($data['frontcolors'] + $data['backcolors']) * $traj->price; // سعر التراج 
            // dd($pull_nu_sheet . '*' . ($data['frontcolors'] . '+' . $data['backcolors']) . '* 30');
        }

        // ***************************************************cover(solovan)***********************************************************************
        // بحسب عدد الافرخ الربع و اضربه في السعر على 4
        // dd($data['covers']);
        $solovan_price = $this->constantsService->findOne(3);
        // dd($data['covers']);
        if ($data['covers'] != null && $data['covers'] != 0) {
            $solovan = $this->coverService->findOne($data['covers']);

            if (is_float($total_standard_sheets) == 'true') {
                if ($data['covers'] == 2 || $data['covers'] == 4) {
                    $cover_price =  (floor($total_standard_sheets) + 1) * $solovan_price->price * 2;
                } else if ($data['covers'] == 1 || $data['covers'] == 3) {
                    $cover_price = (floor($total_standard_sheets) + 1) * $solovan_price->price;
                } else {
                    $cover_price = 0;
                }
            } else {
                if ($data['covers'] == 2 || $data['covers'] == 4) {
                    $cover_price = ($total_standard_sheets) * $solovan_price->price * 2;
                } else if ($data['covers'] == 1 || $data['covers'] == 3) {
                    $cover_price = ($total_standard_sheets) * $solovan_price->price;
                } else {
                    $cover_price = 0;
                }
            }
        }
        // dd($cover_price);

        // ***************************************************rega***********************************************************************
        // dd($data['cutStyle'] == 2);

        if ($data['option'] == 'rega') { //if user choose "rega"
            // dd('d');
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

            if (isset($data['outer_pocket_glue'])) {
                $outer_pocket_glue = $data['quantity'] * 0.45;
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

            if ($data['glue'] == 1) {

                $glue_price = $data['quantity'] * 0.15;
            } else {
                $glue_price = 0;
            }

            if (isset($data['outer_pocket_glue'])) {
                $outer_pocket_glue = $data['quantity'] * 0.45;
            } else {
                $outer_pocket_glue = 0;
            }
        }

        // ***************************************************shipping***********************************************************************

        $shipping_fees = auth()->guard('customer')->user()->city->shipping_price;
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
                'اللزق' => $glue_price,
                'لزق جيب خارجي' => $outer_pocket_glue,
                'التكسير' => $fold_traj_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        // dd($arr);
        $cart_data = [
            'user_id' =>  auth()->guard('customer')->user()->id,
            'image' => $imgName,
            'category' => (key_exists('cat_id', $data) && !empty($data['cat_id'])) ? $category->name : null,
            'paper_type' => (key_exists('paper_type', $data) && !empty($data['paper_type'])) ? $paper_type->name : null,
            'paper_size' => (key_exists('paper_size', $data) && !empty($data['paper_size'])) ? $paper_size->name : null,
            'quantity' => (key_exists('quantity', $data) && !empty($data['quantity'])) ? $data['quantity'] : null,
            'inner_quantity' => (key_exists('inner_quantity', $data) && !empty($data['inner_quantity'])) ? $data['inner_quantity'] : null,
            'print_option' => (key_exists('print_option', $data) && !empty($data['print_option'])) ? $print_option->name : null,
            'front_color' => (key_exists('frontcolors', $data) && !empty($data['frontcolors'])) ? $data['frontcolors'] : null,
            'back_color' => (key_exists('backcolors', $data) && !empty($data['backcolors'])) ? $data['backcolors'] : null,
            'cut_style' => (key_exists('cutStyle', $data) && !empty($data['cutStyle'])) ? $data['cutStyle'] : null,
            'rega' => (key_exists('rega', $data) && !empty($data['rega'])) ? $data['rega'] : null,
            'solovan' => (key_exists('covers', $data) && !empty($data['covers'])) ? $solovan->name : null,
            'cover_paper_type' => (key_exists('cover_paper_type', $data) && !empty($data['cover_paper_type'])) ? $data['cover_paper_type'] : null,
            'cover_front_color' => (key_exists('cover_frontcolors', $data) && !empty($data['cover_frontcolors'])) ? $data['cover_frontcolors'] : null,
            'cover_back_color' => (key_exists('cover_backcolors', $data) && !empty($data['cover_backcolors'])) ? $data['cover_backcolors'] : null,
            'cover_rega' => (key_exists('cover_rega', $data) && !empty($data['cover_rega'])) ? $data['cover_rega'] : null,
            'finish_option' => (key_exists('finish_option', $data) && !empty($data['finish_option'])) ? $data['finish_option'] : null,
            'finish_direction' => (key_exists('finish_dir', $data) && !empty($data['finish_dir'])) ? $data['finish_dir'] : null,
            'notes' => (key_exists('notes', $data) && !empty($data['notes'])) ? $data['notes'] : null,
            'shipping' => $shipping_fees,
            'total_price' => $total_order_price
        ];
        // dd($cart_data);

        return $this->cartRepository->create($cart_data);
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

        $category = $this->categoryService->findOne($data['cat_id']);
        $print_option = $this->printOptionService->findOne($data['print_option']);
        // ***************************************************Image***********************************************************************
        $imgName = null;
        ///////Upload Image////////
        if ($data->hasFile('image')) {
            $imgName = $this->uploadImage($data->file('image'), 'cart', 'flyer');
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
        $pull_nu = $total_number_of_quarter_sheets / 1000;

        $zinkat = $this->constantsService->findOne(1);
        $traj = $this->constantsService->findOne(2);

        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * $zinkat->price; //سعر الزنكات
            $traj_price = $pull_nu * $data['frontcolors'] * $traj->price; //سعر التراج 
            // dd($pull_nu_sheet .'*'. $data['frontcolors'] .'*'. 30);
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            if ($data['frontcolors'] == $data['backcolors']) {
                // طبع و قلب
                $zinkat_price = ($data['frontcolors']) * $zinkat->price;
            } else {

                $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * $zinkat->price;
            }            // dd($pull_nu);
            if (is_float($pull_nu) == 'true') {
                $pull_nu_sheet = floor($pull_nu) + 1; // عدد السحبات
            } else {
                $pull_nu_sheet = $pull_nu;
            }
            // dd($pull_nu_sheet);
            $traj_price = $pull_nu_sheet * ($data['frontcolors'] + $data['backcolors']) * $traj->price; // سعر التراج 
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

        $solovan_price = $this->constantsService->findOne(3);

        if ($data['covers'] != null && $data['covers'] != 0) {
            $solovan = $this->coverService->findOne($data['covers']);

            if (is_float($total_standard_sheets) == 'true') {
                if ($data['covers'] == 2) {
                    $cover_price =  (floor($total_standard_sheets) + 1) * $solovan_price->price * 2;
                } else if ($data['covers'] == 1) {
                    $cover_price = (floor($total_standard_sheets) + 1) * $solovan_price->price;
                } else {
                    $cover_price = 0;
                }
            } else {
                if ($data['covers'] == 2) {
                    $cover_price = ($total_standard_sheets) * $solovan_price->price * 2;
                } else if ($data['covers'] == 1) {
                    $cover_price = ($total_standard_sheets) * $solovan_price->price;
                } else {
                    $cover_price = 0;
                }
            }
        }
        // ***************************************************shipping***********************************************************************
        // dd($data);
        // dd(auth()->guard('customer')->user());  
        $shipping_fees = auth()->guard('customer')->user()->city->shipping_price;
        // dd($shipping_fees);
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
        // dd($arr);

        $cart_data = [
            'user_id' =>  auth()->guard('customer')->user()->id,
            'image' => $imgName,
            'category' => (key_exists('cat_id', $data) && !empty($data['cat_id'])) ? $category->name : null,
            'paper_type' => (key_exists('paper_type', $data) && !empty($data['paper_type'])) ? $paper_type->name : null,
            'paper_size' => (key_exists('paper_size', $data) && !empty($data['paper_size'])) ? $paper_size->name : null,
            'quantity' => (key_exists('quantity', $data) && !empty($data['quantity'])) ? $data['quantity'] : null,
            'inner_quantity' => (key_exists('inner_quantity', $data) && !empty($data['inner_quantity'])) ? $data['inner_quantity'] : null,
            'print_option' => (key_exists('print_option', $data) && !empty($data['print_option'])) ? $print_option->name : null,
            'front_color' => (key_exists('frontcolors', $data) && !empty($data['frontcolors'])) ? $data['frontcolors'] : null,
            'back_color' => (key_exists('backcolors', $data) && !empty($data['backcolors'])) ? $data['backcolors'] : null,
            'cut_style' => (key_exists('cutStyle', $data) && !empty($data['cutStyle'])) ? $data['cutStyle'] : null,
            'rega' => (key_exists('rega', $data) && !empty($data['rega'])) ? $data['rega'] : null,
            'solovan' => (key_exists('covers', $data) && !empty($data['covers'])) ? $solovan->name : null,
            'cover_paper_type' => (key_exists('cover_paper_type', $data) && !empty($data['cover_paper_type'])) ? $data['cover_paper_type'] : null,
            'cover_front_color' => (key_exists('cover_frontcolors', $data) && !empty($data['cover_frontcolors'])) ? $data['cover_frontcolors'] : null,
            'cover_back_color' => (key_exists('cover_backcolors', $data) && !empty($data['cover_backcolors'])) ? $data['cover_backcolors'] : null,
            'cover_rega' => (key_exists('cover_rega', $data) && !empty($data['cover_rega'])) ? $data['cover_rega'] : null,
            'finish_option' => (key_exists('finish_option', $data) && !empty($data['finish_option'])) ? $data['finish_option'] : null,
            'finish_direction' => (key_exists('finish_dir', $data) && !empty($data['finish_dir'])) ? $data['finish_dir'] : null,
            'notes' => (key_exists('notes', $data) && !empty($data['notes'])) ? $data['notes'] : null,
            'shipping' => $shipping_fees,
            'total_price' => $total_order_price
        ];
        // dd($cart_data);

        return $this->cartRepository->create($cart_data);
    }

    public function createLetterhead($data) //done
    {
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $rega_price = 0;
        $cut_style_price = 0;
        $shipping_fees = 0;

        $category = $this->categoryService->findOne($data['cat_id']);
        $print_option = $this->printOptionService->findOne($data['print_option']);
        // ***************************************************Image***********************************************************************
        $imgName = null;
        ///////Upload Image////////
        if ($data->hasFile('image')) {
            $imgName = $this->uploadImage($data->file('image'), 'cart', 'letterhead');
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
        $pull_nu_sheet = $total_number_of_quarter_sheets / 1000;
        // dd(is_float($pull_nu_sheet));
        $zinkat = $this->constantsService->findOne(1);
        $traj = $this->constantsService->findOne(2);

        if (is_float($pull_nu_sheet) == 'true') {
            $pull_nu_sheet = (floor($pull_nu_sheet) + 1);
            // dd($rega);
        }
        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * $zinkat->price; //سعر الزنكات
            $traj_price = $pull_nu_sheet * $data['frontcolors'] * $traj->price; //سعر التراج 
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

        $shipping_fees = auth()->guard('customer')->user()->city->shipping_price;
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
        // dd($arr);
        $cart_data = [
            'user_id' =>  auth()->guard('customer')->user()->id,
            'image' => $imgName,
            'category' => (key_exists('cat_id', $data) && !empty($data['cat_id'])) ? $category->name : null,
            'paper_type' => (key_exists('paper_type', $data) && !empty($data['paper_type'])) ? $paper_type->name : null,
            'paper_size' => (key_exists('paper_size', $data) && !empty($data['paper_size'])) ? $paper_size->name : null,
            'quantity' => (key_exists('quantity', $data) && !empty($data['quantity'])) ? $data['quantity'] : null,
            'inner_quantity' => (key_exists('inner_quantity', $data) && !empty($data['inner_quantity'])) ? $data['inner_quantity'] : null,
            'print_option' => (key_exists('print_option', $data) && !empty($data['print_option'])) ? $print_option->name : null,
            'front_color' => (key_exists('frontcolors', $data) && !empty($data['frontcolors'])) ? $data['frontcolors'] : null,
            'back_color' => (key_exists('backcolors', $data) && !empty($data['backcolors'])) ? $data['backcolors'] : null,
            'cut_style' => (key_exists('cutStyle', $data) && !empty($data['cutStyle'])) ? $data['cutStyle'] : null,
            'rega' => (key_exists('rega', $data) && !empty($data['rega'])) ? $data['rega'] : null,
            // 'solovan' => (key_exists('covers', $data) && !empty($data['covers'])) ? $solovan->name : null,
            'cover_paper_type' => (key_exists('cover_paper_type', $data) && !empty($data['cover_paper_type'])) ? $data['cover_paper_type'] : null,
            'cover_front_color' => (key_exists('cover_frontcolors', $data) && !empty($data['cover_frontcolors'])) ? $data['cover_frontcolors'] : null,
            'cover_back_color' => (key_exists('cover_backcolors', $data) && !empty($data['cover_backcolors'])) ? $data['cover_backcolors'] : null,
            'cover_rega' => (key_exists('cover_rega', $data) && !empty($data['cover_rega'])) ? $data['cover_rega'] : null,
            'finish_option' => (key_exists('finish_option', $data) && !empty($data['finish_option'])) ? $data['finish_option'] : null,
            'finish_direction' => (key_exists('finish_dir', $data) && !empty($data['finish_dir'])) ? $data['finish_dir'] : null,
            'notes' => (key_exists('notes', $data) && !empty($data['notes'])) ? $data['notes'] : null,
            'shipping' => $shipping_fees,
            'total_price' => $total_order_price
        ];
        // dd($cart_data);

        return $this->cartRepository->create($cart_data);
    }

    public function createSticker($data) // done ->need to add solovan equation(fixed)
    {
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $cut_price = 0;
        $shipping_fees = 0;

        $category = $this->categoryService->findOne($data['cat_id']);
        $print_option = $this->printOptionService->findOne($data['print_option']);
        // ***************************************************Image***********************************************************************
        $imgName = null;
        ///////Upload Image////////
        if ($data->hasFile('image')) {
            $imgName = $this->uploadImage($data->file('image'), 'cart', 'sticker');
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
        $pull_nu = $total_number_of_quarter_sheets / 1000;

        $zinkat = $this->constantsService->findOne(1);
        $traj = $this->constantsService->findOne(2);

        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * $zinkat->price; //سعر الزنكات

            if (is_float($pull_nu) == true) {
                $pull_nu = floor($pull_nu) + 1;
            }
            $traj_price = $pull_nu * $data['frontcolors'] * $traj->price; //سعر التراج 
            // dd($pull_nu_sheet .'*'. $data['frontcolors'] .'*'. 30);
        }
        // ***************************************************cut number***********************************************************************

        if ($data['cut_number']) {
            if ($total_number_of_quarter_sheets > 1000) {
                $is_float = $total_number_of_quarter_sheets / 1000;
                if (is_float($is_float) == "true") {
                    $cut_number = floor($total_number_of_quarter_sheets / 1000) + 1;
                    // dd($over_1000);
                } else {
                    $cut_number = floor($total_number_of_quarter_sheets / 1000);
                }
                $cut_price = $cut_number *  $total_per_quarter_sheet * $data['cut_number'] * 1.5; //سعر التراج 
                // dd($pull_nu_sheet .'*'. $data['frontcolors'] .'*'. 30);
            } else {

                $cut_price = ($total_number_of_quarter_sheets / 1000) *  $total_per_quarter_sheet * $data['cut_number'] * 1.5; //سعر التراج 

            }
        }
        // ***************************************************cover(solovan)***********************************************************************
        // بحسب عدد الافرخ الربع و اضربه في السعر على 4
        // dd($data['covers']);
        $solovan_price = $this->constantsService->findOne(3);

        if ($data['covers'] != null) {

            if (is_float($total_standard_sheets) == 'true') {
                if ($data['covers'] == 1) {
                    $solovan = $this->coverService->findOne($data['covers']);
                    $cover_price = (floor($total_standard_sheets) + 1) * $solovan_price->price;
                } else {
                    $cover_price = 0;
                }
            } else {
                if ($data['covers'] == 1) {
                    $solovan = $this->coverService->findOne($data['covers']);

                    $cover_price = ($total_standard_sheets) * $solovan_price->price;
                } else {
                    $cover_price = 0;
                }
            }
        }
        // ***************************************************shipping***********************************************************************

        $shipping_fees = auth()->guard('customer')->user()->city->shipping_price;
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
            $total_sheets_price + $zinkat_price + $traj_price + $cut_price + $cover_price + $shipping_fees;
        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'سعر الافرخ المستخدمة' => $total_sheets_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                'السوليفان' => $cover_price,
                'القص' => $cut_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        // dd($arr);


        $cart_data = [
            'user_id' =>  auth()->guard('customer')->user()->id,
            'image' => $imgName,
            'category' => (key_exists('cat_id', $data) && !empty($data['cat_id'])) ? $category->name : null,
            'paper_type' => (key_exists('paper_type', $data) && !empty($data['paper_type'])) ? $paper_type->name : null,
            'paper_size' => (key_exists('paper_size', $data) && !empty($data['paper_size'])) ? $paper_size->name : null,
            'quantity' => (key_exists('quantity', $data) && !empty($data['quantity'])) ? $data['quantity'] : null,
            'inner_quantity' => (key_exists('inner_quantity', $data) && !empty($data['inner_quantity'])) ? $data['inner_quantity'] : null,
            'print_option' => (key_exists('print_option', $data) && !empty($data['print_option'])) ? $print_option->name : null,
            'front_color' => (key_exists('frontcolors', $data) && !empty($data['frontcolors'])) ? $data['frontcolors'] : null,
            'back_color' => (key_exists('backcolors', $data) && !empty($data['backcolors'])) ? $data['backcolors'] : null,
            'cut_style' => (key_exists('cutStyle', $data) && !empty($data['cutStyle'])) ? $data['cutStyle'] : null,
            'cut_number' => (key_exists('cut_number', $data) && !empty($data['cut_number'])) ? $data['cut_number'] : null,
            'rega' => (key_exists('rega', $data) && !empty($data['rega'])) ? $data['rega'] : null,
            'solovan' => (key_exists('covers', $data) && !empty($data['covers'])) ? $solovan->name : null,
            'cover_paper_type' => (key_exists('cover_paper_type', $data) && !empty($data['cover_paper_type'])) ? $data['cover_paper_type'] : null,
            'cover_front_color' => (key_exists('cover_frontcolors', $data) && !empty($data['cover_frontcolors'])) ? $data['cover_frontcolors'] : null,
            'cover_back_color' => (key_exists('cover_backcolors', $data) && !empty($data['cover_backcolors'])) ? $data['cover_backcolors'] : null,
            'cover_rega' => (key_exists('cover_rega', $data) && !empty($data['cover_rega'])) ? $data['cover_rega'] : null,
            'finish_option' => (key_exists('finish_option', $data) && !empty($data['finish_option'])) ? $data['finish_option'] : null,
            'finish_direction' => (key_exists('finish_dir', $data) && !empty($data['finish_dir'])) ? $data['finish_dir'] : null,
            'notes' => (key_exists('notes', $data) && !empty($data['notes'])) ? $data['notes'] : null,
            'shipping' => $shipping_fees,
            'total_price' => $total_order_price
        ];
        // dd($cart_data);

        return $this->cartRepository->create($cart_data);
    }

    public function createBlocknote($data) // done  8/3
    {
        $total_sheets_price = 0;
        $total_cover_paper_price = 0;
        $cut_style_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $traj_price_cover = 0;
        $zinkat_price_cover = 0;
        $shipping_fees = 0;

        $category = $this->categoryService->findOne($data['cat_id']);
        $print_option = $this->printOptionService->findOne($data['print_option']);
        // ***************************************************Image***********************************************************************
        $imgName = null;
        ///////Upload Image////////
        if ($data->hasFile('image')) {
            $imgName = $this->uploadImage($data->file('image'), 'cart', 'blocknote');
        }


        $data = $data->all();
        // ***************************************************paper size,count & price***********************************************************************
        $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $total_standard_sheets = (($data['quantity'] * $data['inner_quantity']) / $total_per_full_sheet) + 25; // عدد الافرخ الكاملة المستخدمة
        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price) * $total_standard_sheets; // حساب ثمن الورق كله

        // ***************************************************zinkat & traj***********************************************************************
        $total_per_quarter_sheet =  $paper_size->quantity_in_quarter; // العدد الكلي في الربع فرخ الواحد
        $total_number_of_quarter_sheets =  ($data['quantity'] * $data['inner_quantity']) / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        $pull_nu = $total_number_of_quarter_sheets / 1000;

        $zinkat = $this->constantsService->findOne(1);
        $traj = $this->constantsService->findOne(2);

        if (is_float($pull_nu) == 'true') {
            $pull_nu_sheet = floor($pull_nu) + 1; // عدد السحبات
        } else {
            $pull_nu_sheet = $pull_nu;
        }
        // dd($pull_nu_sheet);
        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * $zinkat->price; //سعر الزنكات
            $traj_price = $pull_nu_sheet * $data['frontcolors'] * $traj->price; //سعر التراج 
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * $zinkat->price; // سعر الزنكات

            $traj_price = $pull_nu_sheet * ($data['frontcolors'] + $data['backcolors']) * $traj->price; // سعر التراج 
        }
        // *************************************************** finish option/direction ***********************************************************************

        $finish_option_price = $this->finishOptionService->findOne($data['finish_option']);

        if ($data['finish_option'] == 1 || $data['finish_option'] == 2) {
            $finish_price = $data['quantity'] * $finish_option_price->price;
        } else {
            $finish_direction = $data['finish_dir'];
            if ($finish_direction == 1 || $finish_direction == 2) {
                $length = $paper_size->width;
                $is_length_fraction = $length - floor($length);
                // dd($is_length_fraction);
                if ($is_length_fraction > 0 == true) {
                    $finish_price = $data['quantity'] * (floor($length) + 1) * $finish_option_price->price;
                } else {
                    $finish_price = $data['quantity'] * floor($length) * $finish_option_price->price;
                }
                // dd($finish_price);
            } elseif ($finish_direction == 3 || $finish_direction == 4) {
                $length = $paper_size->height;
                $is_length_fraction = $length - floor($length);
                if ($is_length_fraction > 0 == true) {
                    $finish_price = $data['quantity'] * (floor($length) + 1) * $finish_option_price->price;
                } else {
                    $finish_price = $data['quantity'] * floor($length) * $finish_option_price->price;
                }
            }
        }


        // ***************************************************cover للغلاف***********************************************************************
        // **********************cover paper price********************
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $cover_paper_type = $this->paperTypeService->findOne($data['cover_paper_type']); // معرفة نوع الورق
        $standard_sheet_cover_price = $cover_paper_type->price; // تحديد سعر الورقة
        $total_used_sheets = (($data['quantity'] * 2) / $total_per_full_sheet) + 18;
        $total_cover_paper_price =  $total_used_sheets * $cover_paper_type->price; // حساب ثمن الغلاف

        // ***********************solovan**********************************
        $solovan_price = $this->constantsService->findOne(3);

        if ($data['covers'] != null) {
            $solovan = $this->coverService->findOne($data['covers']);
            if (is_float($total_used_sheets) == 'true') {
                if ($data['covers'] == 2) {
                    $cover_price =  (floor($total_used_sheets) + 1) * $solovan_price->price * 2;
                } else if ($data['covers'] == 1) {
                    $cover_price = (floor($total_used_sheets) + 1) * $solovan_price->price;
                } else {
                    $cover_price = 0;
                }
            } else {
                if ($data['covers'] == 2) {
                    $cover_price = ($total_used_sheets) * $solovan_price->price * 2;
                } else if ($data['covers'] == 1) {
                    $cover_price = ($total_used_sheets) * $solovan_price->price;
                } else {
                    $cover_price = 0;
                }
            }
        }

        // *************************zinkat & traj************************************************
        $total_number_of_quarter_sheets_cover =  ($data['quantity'] * 2) / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
        $pull_nu_cover = $total_number_of_quarter_sheets_cover / 1000;
        if (is_float($pull_nu_cover) == 'true') {
            $pull_nu_sheet_cover = floor($pull_nu_cover) + 1; // عدد السحبات
        } else {
            $pull_nu_sheet_cover = $pull_nu_cover;
        }
        // dd($pull_nu_sheet);
        if ($data['cover_print_option'] == 1) { //  وجه فقط
            $zinkat_price_cover = $data['cover_frontcolors'] * 30; //سعر الزنكات
            $traj_price_cover = $pull_nu_sheet_cover * $data['cover_frontcolors'] * 30; //سعر التراج 
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price_cover = ($data['cover_frontcolors'] + $data['cover_backcolors']) * 30; // سعر الزنكات

            $traj_price_cover = $pull_nu_sheet_cover * ($data['cover_frontcolors'] + $data['cover_backcolors']) * 30; // سعر التراج 
        }

        // ***************************************************cut style***********************************************************************

        if ($data['cutStyle'] == 2) {


            $total_cuts = ($data['quantity'] * $data['inner_quantity']) / 1000;

            if (is_float($data['quantity'] / 1000)) {
                $cover_cuts = floor($data['quantity'] / 1000) + 1;
            } else {
                $cover_cuts = $data['quantity'] / 1000;
            }
            // dd($cover_cuts);
            $cut_style_price =  ($total_cuts * 10) + (($cover_cuts) * 10);
            // }

        }
        // ***************************************************shipping***********************************************************************

        $shipping_fees = auth()->guard('customer')->user()->city->shipping_price;


        if (($total_number_of_quarter_sheets + $total_number_of_quarter_sheets_cover) > 1000) {
            $is_float_inner = ($total_number_of_quarter_sheets) / 1000;
            $is_float_cover = ($total_number_of_quarter_sheets_cover) / 1000;

            if (is_float($is_float_inner) == "true") {
                $over_1000 = floor(($total_number_of_quarter_sheets) / 1000) + 1;
                if (is_float($is_float_cover) == "true") {
                    $over_1000 += floor(($total_number_of_quarter_sheets_cover) / 1000) + 1;
                }
                // dd($over_1000);
            } else {
                $over_1000 = floor(($total_number_of_quarter_sheets + $total_number_of_quarter_sheets_cover) / 1000);
            }
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000 - 1);
        }

        // ***************************************************total***********************************************************************
        $total_order_price =
            $total_sheets_price + $total_cover_paper_price + $zinkat_price + $zinkat_price_cover + $traj_price_cover + $traj_price  + $finish_price + $cut_style_price + $cover_price + $shipping_fees;
        // dd('test');
        $arr =
            [
                'عدد الافرخ الكاملة' => $total_standard_sheets,
                'عدد الافرخ الربع' => $total_number_of_quarter_sheets,
                'سعر الفرخ' => $standard_sheet_price,
                'الورق سعر الافرخ المستخدمة' => $total_sheets_price,
                'سعر فرخ الغلاف' => $standard_sheet_cover_price,
                'سعر الغلاف' => $total_cover_paper_price,
                'سوليفان' => $cover_price,
                'الزنكات' => $zinkat_price,
                'التراجات' => $traj_price,
                'تراجات-الغلاف' => $traj_price_cover,
                'زنكات-الغلاف' => $zinkat_price_cover,
                'التقفيل' => $finish_price,
                'القص' => $cut_style_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        // dd($arr);

        $cart_data = [
            'user_id' =>  auth()->guard('customer')->user()->id,
            'image' => $imgName,
            'category' => (key_exists('cat_id', $data) && !empty($data['cat_id'])) ? $category->name : null,
            'paper_type' => (key_exists('paper_type', $data) && !empty($data['paper_type'])) ? $paper_type->name : null,
            'paper_size' => (key_exists('paper_size', $data) && !empty($data['paper_size'])) ? $paper_size->name : null,
            'quantity' => (key_exists('quantity', $data) && !empty($data['quantity'])) ? $data['quantity'] : null,
            'inner_quantity' => (key_exists('inner_quantity', $data) && !empty($data['inner_quantity'])) ? $data['inner_quantity'] : null,
            'print_option' => (key_exists('print_option', $data) && !empty($data['print_option'])) ? $print_option->name : null,
            'front_color' => (key_exists('frontcolors', $data) && !empty($data['frontcolors'])) ? $data['frontcolors'] : null,
            'back_color' => (key_exists('backcolors', $data) && !empty($data['backcolors'])) ? $data['backcolors'] : null,
            'cut_style' => (key_exists('cutStyle', $data) && !empty($data['cutStyle'])) ? $data['cutStyle'] : null,
            'rega' => (key_exists('rega', $data) && !empty($data['rega'])) ? $data['rega'] : null,
            'solovan' => (key_exists('covers', $data) && !empty($data['covers'])) ? $solovan->name : null,
            'cover_paper_type' => (key_exists('cover_paper_type', $data) && !empty($data['cover_paper_type'])) ? $data['cover_paper_type'] : null,
            'cover_front_color' => (key_exists('cover_frontcolors', $data) && !empty($data['cover_frontcolors'])) ? $data['cover_frontcolors'] : null,
            'cover_back_color' => (key_exists('cover_backcolors', $data) && !empty($data['cover_backcolors'])) ? $data['cover_backcolors'] : null,
            'cover_rega' => (key_exists('cover_rega', $data) && !empty($data['cover_rega'])) ? $data['cover_rega'] : null,
            'finish_option' => (key_exists('finish_option', $data) && !empty($data['finish_option'])) ? $data['finish_option'] : null,
            'finish_direction' => (key_exists('finish_dir', $data) && !empty($data['finish_dir'])) ? $data['finish_dir'] : null,
            'notes' => (key_exists('notes', $data) && !empty($data['notes'])) ? $data['notes'] : null,
            'shipping' => $shipping_fees,
            'total_price' => $total_order_price
        ];
        // dd($cart_data);

        return $this->cartRepository->create($cart_data);
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

        $category = $this->categoryService->findOne($data['cat_id']);
        $print_option = $this->printOptionService->findOne($data['print_option']);
        // ***************************************************Image***********************************************************************
        $imgName = null;
        ///////Upload Image////////
        if ($data->hasFile('image')) {
            $imgName = $this->uploadImage($data->file('image'), 'cart', 'prescription');
        }


        $data = $data->all();
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

        $zinkat = $this->constantsService->findOne(1);
        $traj = $this->constantsService->findOne(2);

        // dd($pull_nu);
        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * $zinkat->price; //سعر الزنكات
            // dd($zinkat_price);
            $traj_price = $pull_nu * $data['frontcolors'] * $traj->price; //سعر التراج 
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors'])  * $zinkat->price; // سعر الزنكات

            $traj_price = $pull_nu * ($data['frontcolors'] + $data['backcolors']) * $traj->price; // سعر التراج 
            // dd($pull_nu_sheet);
        }

        // *************************************************** finish option/direction ***********************************************************************
        //    دبوس/غراء
        $finish_option_price = $this->finishOptionService->findOne($data['finish_option']);

        $finish_price = $data['quantity'] * $finish_option_price->price;

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

        $shipping_fees = auth()->guard('customer')->user()->city->shipping_price;
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
        // dd($arr);
        $cart_data = [
            'user_id' =>  auth()->guard('customer')->user()->id,
            'image' => $imgName,
            'category' => (key_exists('cat_id', $data) && !empty($data['cat_id'])) ? $category->name : null,
            'paper_type' => (key_exists('paper_type', $data) && !empty($data['paper_type'])) ? $paper_type->name : null,
            'paper_size' => (key_exists('paper_size', $data) && !empty($data['paper_size'])) ? $paper_size->name : null,
            'quantity' => (key_exists('quantity', $data) && !empty($data['quantity'])) ? $data['quantity'] : null,
            'inner_quantity' => (key_exists('inner_quantity', $data) && !empty($data['inner_quantity'])) ? $data['inner_quantity'] : null,
            'print_option' => (key_exists('print_option', $data) && !empty($data['print_option'])) ? $print_option->name : null,
            'front_color' => (key_exists('frontcolors', $data) && !empty($data['frontcolors'])) ? $data['frontcolors'] : null,
            'back_color' => (key_exists('backcolors', $data) && !empty($data['backcolors'])) ? $data['backcolors'] : null,
            'cut_style' => (key_exists('cutStyle', $data) && !empty($data['cutStyle'])) ? $data['cutStyle'] : null,
            'zigzag' => (key_exists('zigzag', $data) && !empty($data['zigzag'])) ? $data['zigzag'] : null,
            'rega' => (key_exists('rega', $data) && !empty($data['rega'])) ? $data['rega'] : null,
            'cover_paper_type' => (key_exists('cover_paper_type', $data) && !empty($data['cover_paper_type'])) ? $data['cover_paper_type'] : null,
            'cover_front_color' => (key_exists('cover_frontcolors', $data) && !empty($data['cover_frontcolors'])) ? $data['cover_frontcolors'] : null,
            'cover_back_color' => (key_exists('cover_backcolors', $data) && !empty($data['cover_backcolors'])) ? $data['cover_backcolors'] : null,
            'cover_rega' => (key_exists('cover_rega', $data) && !empty($data['cover_rega'])) ? $data['cover_rega'] : null,
            'finish_option' => (key_exists('finish_option', $data) && !empty($data['finish_option'])) ? $data['finish_option'] : null,
            'finish_direction' => (key_exists('finish_dir', $data) && !empty($data['finish_dir'])) ? $data['finish_dir'] : null,
            'notes' => (key_exists('notes', $data) && !empty($data['notes'])) ? $data['notes'] : null,
            'shipping' => $shipping_fees,
            'total_price' => $total_order_price
        ];
        // dd($cart_data);

        return $this->cartRepository->create($cart_data);
    }

    public function createEnvelope($data) // done -> add paper type to database (fixed)
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

        $category = $this->categoryService->findOne($data['cat_id']);
        $print_option = $this->printOptionService->findOne($data['print_option']);
        // ***************************************************Image***********************************************************************
        $imgName = null;
        ///////Upload Image////////
        if ($data->hasFile('image')) {
            $imgName = $this->uploadImage($data->file('image'), 'cart', 'envelope');
        }


        $data = $data->all();
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
        $zinkat = $this->constantsService->findOne(1);
        $traj = $this->constantsService->findOne(4);

        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * $zinkat->price; //سعر الزنكات
            $traj_price = $pull_nu * $data['frontcolors'] * $traj->price; //سعر التراج 
        }
        // ***************************************************shipping***********************************************************************

        $shipping_fees = auth()->guard('customer')->user()->city->shipping_price;
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
        // dd($arr);

        $cart_data = [
            'user_id' =>  auth()->guard('customer')->user()->id,
            'image' => $imgName,
            'category' => (key_exists('cat_id', $data) && !empty($data['cat_id'])) ? $category->name : null,
            'paper_type' => (key_exists('paper_type', $data) && !empty($data['paper_type'])) ? $paper_type->name : null,
            // 'paper_size' => (key_exists('paper_size', $data) && !empty($data['paper_size'])) ? $paper_size->name : null,
            'quantity' => (key_exists('quantity', $data) && !empty($data['quantity'])) ? $data['quantity'] : null,
            'inner_quantity' => (key_exists('inner_quantity', $data) && !empty($data['inner_quantity'])) ? $data['inner_quantity'] : null,
            'print_option' => (key_exists('print_option', $data) && !empty($data['print_option'])) ? $print_option->name : null,
            'front_color' => (key_exists('frontcolors', $data) && !empty($data['frontcolors'])) ? $data['frontcolors'] : null,
            'back_color' => (key_exists('backcolors', $data) && !empty($data['backcolors'])) ? $data['backcolors'] : null,
            'cut_style' => (key_exists('cutStyle', $data) && !empty($data['cutStyle'])) ? $data['cutStyle'] : null,
            'rega' => (key_exists('rega', $data) && !empty($data['rega'])) ? $data['rega'] : null,
            // 'solovan' => (key_exists('covers', $data) && !empty($data['covers'])) ? $solovan->name : null,
            'cover_paper_type' => (key_exists('cover_paper_type', $data) && !empty($data['cover_paper_type'])) ? $data['cover_paper_type'] : null,
            'cover_front_color' => (key_exists('cover_frontcolors', $data) && !empty($data['cover_frontcolors'])) ? $data['cover_frontcolors'] : null,
            'cover_back_color' => (key_exists('cover_backcolors', $data) && !empty($data['cover_backcolors'])) ? $data['cover_backcolors'] : null,
            'cover_rega' => (key_exists('cover_rega', $data) && !empty($data['cover_rega'])) ? $data['cover_rega'] : null,
            'finish_option' => (key_exists('finish_option', $data) && !empty($data['finish_option'])) ? $data['finish_option'] : null,
            'finish_direction' => (key_exists('finish_dir', $data) && !empty($data['finish_dir'])) ? $data['finish_dir'] : null,
            'notes' => (key_exists('notes', $data) && !empty($data['notes'])) ? $data['notes'] : null,
            'shipping' => $shipping_fees,
            'total_price' => $total_order_price
        ];
        // dd($cart_data);

        return $this->cartRepository->create($cart_data);
    }

    public function createCopybook($data)
    {
        // dd('f');
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
        $zinkat = $this->constantsService->findOne(1);
        $traj = $this->constantsService->findOne(2);

        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * $zinkat->price; //سعر الزنكات
            $traj_price = $pull_nu_sheet * $data['frontcolors'] * $traj->price; //سعر التراج 
            // dd($pull_nu_sheet .'*'. $data['frontcolors'] .'*'. 30);
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * $zinkat->price; // سعر الزنكات
            // dd($pull_nu);

            // dd($pull_nu_sheet);
            $traj_price = $pull_nu_sheet * ($data['frontcolors'] + $data['backcolors']) * $traj->price; // سعر التراج 
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
        $finish_option_price = $this->finishOptionService->findOne($data['finish_option']);

        if ($data['zigzag'] == 1) {
            //    دبوس/غراء
            $finish_price = $data['quantity'] * $finish_option_price->price;
        } else {
            if ($data['finish_option'] == 1 || $data['finish_option'] == 2) {
                $finish_price = $data['quantity'] * $finish_option_price->price;
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

    public function createMagazine($data) //done 9/3
    {
        // dd($data->image);
        $total_sheets_price = 0;
        $zinkat_price = 0;
        $traj_price = 0;
        $cover_price = 0;
        $cut_style_price = 0;
        $finish_price = 0;
        $shipping_fees = 0;

        $category = $this->categoryService->findOne($data['cat_id']);
        $print_option = $this->printOptionService->findOne($data['print_option']);
        // ***************************************************Image***********************************************************************
        $imgName = null;
        ///////Upload Image////////
        if ($data->hasFile('image')) {
            $imgName = $this->uploadImage($data->file('image'), 'cart', 'magazine');
        }


        $data = $data->all();
        // ***************************************************paper size,count & price***********************************************************************
        $paper_size = $this->paperSizeService->findOne($data['paper_size']); // get chosen size data 
        $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
        $total_standard_sheets = ($data['quantity'] * $data['inner_quantity']) / $total_per_full_sheet; // عدد الافرخ الكاملة المستخدمة
        $paper_type = $this->paperTypeService->findOne($data['paper_type']); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        // dd($standard_sheet_price);
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


        $number_of_zinkat = $data['inner_quantity'] / $total_per_quarter_sheet;
        if ($data['print_option'] == 1) {
            $used_zinkat = $number_of_zinkat;
            // dd($number_of_zinkat);
        } else {
            $used_zinkat = 2 * $number_of_zinkat;
        }
        // dd($used_zinkat);
        for ($i = 1; $i <= $used_zinkat; $i++) {

            $total_number_of_quarter_sheets += 50;
            $total_standard_sheets = $total_number_of_quarter_sheets / 4;
            $total_sheets_price =  ($standard_sheet_price) * $total_standard_sheets; // حساب ثمن الورق كله


        }
        if (is_float($pull_nu)) {
            $pull_nu_sheet = floor($pull_nu) + 1; // عدد السحبات
        } else {
            $pull_nu_sheet = $pull_nu;
        }

        $zinkat = $this->constantsService->findOne(1);
        $traj = $this->constantsService->findOne(2);

        // dd($number_of_zinkat);
        if ($data['print_option'] == 1) { //  وجه فقط
            $zinkat_price = $data['frontcolors'] * $number_of_zinkat * $zinkat->price; //سعر الزنكات



            if ($data['print_option'] == 1) {

                $traj_price = $pull_nu_sheet * $data['frontcolors'] * $traj->price; //سعر التراج 
            }
        } elseif ($data['print_option'] == 2) { //  وجه و ضهر
            $zinkat_price = ($data['frontcolors'] + $data['backcolors']) * $number_of_zinkat * $zinkat->price; // سعر الزنكات

            $traj_price = $pull_nu_sheet * ($data['frontcolors'] + $data['backcolors']) * $traj->price; // سعر التراج 
            // dd($pull_nu_sheet);
        }
        // $total_sheets_price =  ($standard_sheet_price/4) * $total_number_of_quarter_sheets; // حساب ثمن الورق كله

        // ***************************************************cut style***********************************************************************
        if ($data['cutStyle'] == 2) {

            if (is_float($data['quantity'] / 1000)) {
                $quantity = floor($data['quantity'] / 1000) + 1;
            } else {
                $quantity = $data['quantity'];
            }
            $total_cuts = ($quantity * $data['inner_quantity']) / 1000;
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
        $finish_option = $this->finishOptionService->findOne($data['finish_option']);
        $inner_pages_price = ($data['inner_quantity'] * 0.05);

        $price_of_pins =  $inner_pages_price +$finish_option->price;
        $finish_price = $data['quantity'] * $price_of_pins;
        //    dd($inner_pages_price + 0.20 );


        // ***************************************************cover للغلاف***********************************************************************
        if ($data['with_cover'] == 1) {
            // **********************cover paper price********************

            $total_per_full_sheet =  $paper_size->quantity_in_standard; // العدد الكلي في الفرخ الواحد
            $cover_paper_type = $this->paperTypeService->findOne($data['cover_paper_type']); // معرفة نوع الورق
            $standard_sheet_cover_price = $cover_paper_type->price; // تحديد سعر الورقة
            $total_used_sheets = (($data['quantity']) / $total_per_full_sheet) + 18;
            $total_cover_paper_price =  $total_used_sheets * $cover_paper_type->price; // حساب ثمن الغلاف
            $total_number_of_quarter_sheets_cover =  ($data['quantity'] * 2) / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة

            // ***********************solovan**********************************
            $solovan_price = $this->constantsService->findOne(3);

            if ($data['covers'] != null) {
                $solovan = $this->coverService->findOne($data['covers']);
                if (is_float($total_used_sheets) == 'true') {
                    if ($data['covers'] == 2) {
                        $cover_price =  (floor($total_used_sheets) + 1) * $solovan_price->price * 2;
                    } else if ($data['covers'] == 1) {
                        $cover_price = (floor($total_used_sheets) + 1) * $solovan_price->price;
                    } else {
                        $cover_price = 0;
                    }
                } else {
                    if ($data['covers'] == 2) {
                        $cover_price = ($total_used_sheets) * $solovan_price->price * 2;
                    } else if ($data['covers'] == 1) {
                        $cover_price = ($total_used_sheets) * $solovan_price->price;
                    } else {
                        $cover_price = 0;
                    }
                }
            }

            // *************************zinkat & traj************************************************
            $total_number_of_quarter_sheets_cover =  ($data['quantity']) / $total_per_quarter_sheet; // عدد الافرخ الربع المستخدمة
            $pull_nu_cover = $total_number_of_quarter_sheets_cover / 1000;
            if (is_float($pull_nu_cover) == 'true') {
                $pull_nu_sheet_cover = floor($pull_nu_cover) + 1; // عدد السحبات
            } else {
                $pull_nu_sheet_cover = $pull_nu_cover;
            }
            // dd($pull_nu_sheet);
            if ($data['cover_print_option'] == 1) { //  وجه فقط
                $zinkat_price_cover = $data['cover_frontcolors'] * 30; //سعر الزنكات
                $traj_price_cover = $pull_nu_sheet_cover * $data['cover_frontcolors'] * 30; //سعر التراج 
            } elseif ($data['print_option'] == 2) { //  وجه و ضهر
                $zinkat_price_cover = ($data['cover_frontcolors'] + $data['cover_backcolors']) * 30; // سعر الزنكات

                $traj_price_cover = $pull_nu_sheet_cover * ($data['cover_frontcolors'] + $data['cover_backcolors']) * 30; // سعر التراج 
            }
            // **************************************rega************************************************

            $cutStyle = $this->cutStyleService->findOne($data['cutStyle']);
            if ($data['cover_rega'] != null) { //if user choose "rega"
                $rega_nu = ($data['quantity']) / 1000;
                if (is_float(($data['quantity']) / 1000)) {
                    $rega_nu = (floor($data['quantity']) + 1) / 1000;
                }

                $rega_cover_price = $rega_nu * $data['cover_rega'] * 25; // عدد الريجة لكل 1000 * عدد الريجات المختارة * السعر
                // dd($data['rega']);
            }
        } else {
            $total_number_of_quarter_sheets_cover = 0;
            $total_used_sheets = 0;
            $standard_sheet_cover_price = 0;
            $cover_price = 0;
            $zinkat_price_cover = 0;
            $traj_price_cover = 0;
            $rega_cover_price = 0;
            $total_cover_paper_price = 0;
        }
        // ***************************************************shipping***********************************************************************

        $shipping_fees = auth()->guard('customer')->user()->city->shipping_price;
        if (($total_number_of_quarter_sheets + $total_number_of_quarter_sheets_cover) > 1000) {
            $is_float_inner = ($total_number_of_quarter_sheets) / 1000;
            $is_float_cover = ($total_number_of_quarter_sheets_cover) / 1000;

            if (is_float($is_float_inner) == "true") {
                $over_1000 = floor(($total_number_of_quarter_sheets) / 1000) + 1;
                if (is_float($is_float_cover) == "true") {
                    $over_1000 += floor(($total_number_of_quarter_sheets_cover) / 1000) + 1;
                }
                // dd($over_1000);
            } else {
                $over_1000 = floor(($total_number_of_quarter_sheets + $total_number_of_quarter_sheets_cover) / 1000);
            }
            // dd($over_1000);
            $shipping_fees += 10 * ($over_1000 - 1);
        }



        // ***************************************************total***********************************************************************
        // $standard_sheet_price=10;
        $total_order_price =
            $total_sheets_price + $total_cover_paper_price + $zinkat_price + $traj_price + $finish_price + $cut_style_price + $cover_price +
            $zinkat_price_cover + $traj_price_cover + $rega_cover_price + $shipping_fees;
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
                'عدد افرخ الغلاف' => $total_used_sheets,
                ' الغلاف سعر الفرخ' => $standard_sheet_cover_price,
                'الغلاف عدد الافرخ الربع' => $total_number_of_quarter_sheets_cover,
                'سعر افرخ الغلاف' => $total_cover_paper_price,
                'سولفان' => $cover_price,
                'زنكات الغلاف' => $zinkat_price_cover,
                'تراجات الغلاف' => $traj_price_cover,
                'سعر ريجة الغلاف' => $rega_cover_price,
                'الشحن' => $shipping_fees,
                'اجمالي' => $total_order_price,
            ];
        // dd($standard_sheet_price);
        // dd($arr);
        // dd($cutStyle);

        $cart_data = [
            'user_id' => auth()->guard('customer')->user()->id,
            'image' => $imgName,
            'category' => (key_exists('cat_id', $data) && !empty($data['cat_id'])) ? $category->name : null,
            'paper_type' => (key_exists('paper_type', $data) && !empty($data['paper_type'])) ? $paper_type->name : null,
            'paper_size' => (key_exists('paper_size', $data) && !empty($data['paper_size'])) ? $paper_size->name : null,
            'quantity' => (key_exists('quantity', $data) && !empty($data['quantity'])) ? $data['quantity'] : null,
            'inner_quantity' => (key_exists('inner_quantity', $data) && !empty($data['inner_quantity'])) ? $data['inner_quantity'] : null,
            'print_option' => (key_exists('print_option', $data) && !empty($data['print_option'])) ? $print_option->name : null,
            'front_color' => (key_exists('frontcolors', $data) && !empty($data['frontcolors'])) ? $data['frontcolors'] : null,
            'back_color' => (key_exists('backcolors', $data) && !empty($data['backcolors'])) ? $data['backcolors'] : null,
            'cut_style' => (key_exists('cutStyle', $data) && !empty($data['cutStyle'])) ? $data['cutStyle'] : null,
            'rega' => (key_exists('rega', $data) && !empty($data['rega'])) ? $data['rega'] : null,
            'solovan' => (key_exists('covers', $data) && !empty($data['covers'])) ? $solovan->name : null,
            'cover_paper_type' => (key_exists('cover_paper_type', $data) && !empty($data['cover_paper_type'])) ? $data['cover_paper_type'] : null,
            'cover_front_color' => (key_exists('cover_frontcolors', $data) && !empty($data['cover_frontcolors'])) ? $data['cover_frontcolors'] : null,
            'cover_back_color' => (key_exists('cover_backcolors', $data) && !empty($data['cover_backcolors'])) ? $data['cover_backcolors'] : null,
            'cover_rega' => (key_exists('cover_rega', $data) && !empty($data['cover_rega'])) ? $data['cover_rega'] : null,
            'finish_option' => (key_exists('finish_option', $data) && !empty($data['finish_option'])) ? $data['finish_option'] : null,
            'finish_direction' => (key_exists('finish_dir', $data) && !empty($data['finish_dir'])) ? $data['finish_dir'] : null,
            'notes' => (key_exists('notes', $data) && !empty($data['notes'])) ? $data['notes'] : null,
            'shipping' => $shipping_fees,
            'total_price' => $total_order_price
        ];
        // dd($cart_data);

        return $this->cartRepository->create($cart_data);
    }
















    public function findWhere($arr)
    {
        return $this->cartRepository->findWhere($arr);
    }
}
