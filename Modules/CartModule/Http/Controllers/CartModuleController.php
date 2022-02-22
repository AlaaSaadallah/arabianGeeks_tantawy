<?php

namespace Modules\CartModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\CartModule\Services\CartService;
use Modules\MaterialModule\Services\PaperSizePaperTypeService;
use Modules\MaterialModule\Services\PaperSizeService;

class CartModuleController extends Controller
{
    public function __construct(
        CartService $cartService,
        PaperSizeService $paperSizeService,
        PaperSizePaperTypeService $paperTypeService,
        PaperSizePaperTypeService $paperSizePaperTypeService
    ) {
        $this->cartService = $cartService;
        $this->paperSizeService = $paperSizeService;
        $this->paperTypeService = $paperTypeService;
        $this->paperSizePaperTypeService = $paperSizePaperTypeService;
    }

    public function addBrochureToCart(Request $request)
    {
        $this->cartService->createBrochureOrder($request->all());
    }

    public function addLargeFolderToCart(Request $request)
    {
        $this->cartService->createLargeFolder($request->all());
    }

    public function addFlyerToCart(Request $request)
    {
        $this->cartService->createFlyer($request->all());
    }

    public function addLetterheadToCart(Request $request)
    {
        $this->cartService->createLetterhead($request->all());
    }

    public function addStickerToCart(Request $request)
    {
        $this->cartService->createSticker($request->all());
    }

    public function addPrescriptionToCart(Request $request)
    {
        $this->cartService->createPrescription($request->all());
    }

    public function addEnvelopeToCart(Request $request)
    {
        $this->cartService->createEnvelope($request->all());
    }

    public function addCopybookToCart(Request $request)
    {
        $this->cartService->createcopybook($request->all());
    }

    public function filterPaperTypes($cat_id, $size_id)
    {
        //    dd($cat_id);
        // dd('55');
        $selected_size = $this->paperSizePaperTypeService->findWhere(['paper_size_id' => $size_id, 'category_id' => $cat_id])->toArray();
        // dd($selected_size->toArray());
        $filtered_types = [];
        foreach ($selected_size as $size) {
            $filtered_types[$size['id']]['type_id'] =  $size['paper_type_id'];
        }
        $types = [];
        $i = 1;
        foreach ($filtered_types as $type) {
            // dd(( $this->paperTypeService->findWhere(['id'=>$type['type_id']])->first()->toArray()));
            $types[$i] = $this->paperTypeService->findWhere(['id' => $type['type_id']])->first()->toArray();
            $i++;
            // dd($types[$i]->name);
        }
        // $selected_size->paperTypesForSize->toArray();
        // dd(($filtered_types));
        return $types;
    }
















    public function removeProductFromCartAjax($product_id = 0)
    {
        $str_cart = Session::get('CART');
        if ($str_cart == '') {
            echo 'done';
            exit;
        }

        $this->cartService->removeItem($product_id);

        Session::put('CART', json_encode($this->cartService->collectCart()));
        Session::save();
        echo 'done';
        exit;
    }
}
