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
public function index()
{
    // dd(auth()->guard('customer')->user()->all());
    $cart_items = $this->cartService->findWhere(['user_id'=>auth()->guard('customer')->user()->id]);
   return view('cartmodule::index',compact('cart_items'));
}

    public function addBrochureToCart(Request $request)
    {
        if (auth()->guard('customer')->user()) {
      $brochure=  $this->cartService->createBrochureOrder($request);
        return redirect()->route('user.cart');
        }
    }

    public function addLargeFolderToCart(Request $request)
    {
        if (auth()->guard('customer')->user()) {

        $this->cartService->createLargeFolder($request);
        return redirect()->route('user.cart');
        }
    }

    public function addFlyerToCart(Request $request)
    {
        if (auth()->guard('customer')->user()) {

        $this->cartService->createFlyer($request);
        return redirect()->route('user.cart');
        }
    }

    public function addLetterheadToCart(Request $request)
    {
        if (auth()->guard('customer')->user()) {

        $this->cartService->createLetterhead($request);
        return redirect()->route('user.cart');
        }
    }

    public function addStickerToCart(Request $request)
    {
        if (auth()->guard('customer')->user()) {

        $this->cartService->createSticker($request);
        return redirect()->route('user.cart');
        }
    }

    public function addPrescriptionToCart(Request $request)
    {
        if (auth()->guard('customer')->user()) {

        $this->cartService->createPrescription($request);
        return redirect()->route('user.cart');
        }
    }

    public function addEnvelopeToCart(Request $request)
    {
        if (auth()->guard('customer')->user()) {

        $this->cartService->createEnvelope($request);
        return redirect()->route('user.cart');
        }
    }

    public function addCopybookToCart(Request $request)
    {
        if (auth()->guard('customer')->user()) {

        $this->cartService->createcopybook($request);
        }
    }

    public function addBlocknoteToCart(Request $request)
    {
        if (auth()->guard('customer')->user()) {

        $this->cartService->createBlocknote($request);
        return redirect()->route('user.cart');
        }
    }

    public function addMagazineToCart(Request $request)
    {
        if (auth()->guard('customer')->user()) {

        $this->cartService->createMagazine($request);
        return redirect()->route('user.cart');
        }
    }
 public function removeFromCart($id)
 {
    $delete = $this->cartService->delete($id);
    return redirect()->route('user.cart');
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







public function mail()
{
    $pdf = FacadePdf::loadView('cartmodule::pdf',$data);

    // Mail::send('paymentmodule::supplier.email', $data, function ($message) use ($data, $pdf) {

    //     $message->to($data["email"], $data["email"])

    //         ->subject($data["title"])

    //         ->attachData($pdf->output(), "Transactions_report.pdf");
    // });
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
