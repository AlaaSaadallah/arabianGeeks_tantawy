<?php

namespace Modules\CartModule\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CartModule\Services\CartService;
use Yajra\DataTables\Facades\DataTables;

class CartAdminController extends Controller
{
    public function __construct(
        CartService $cartService
    ) {
        $this->cartService = $cartService;
    }

    public function index()
    {
        return view('cartmodule::admin.index');
    }

    public function indexCarts(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $carts = $this->cartService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($carts);

        $table->addColumn(
            'action',
            function ($carts) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.carts.show', $carts->id) . '" role="button"><i class="fa fa-eye"></i>
            &nbsp;عرض</a>';


                return $button;
            }
        );

        $table->addColumn(
            'user_id',
            function ($carts) {
                if($carts->customer()){

                    return $carts->customer->name;
                }else{
                    return '';
                }
            }
        );

        $table->addColumn(
            'phone',
            function ($carts) {
                if($carts->customer()){

                    return $carts->customer->phone;
                }else{
                    return '';
                }
            }
        );
        $table->rawColumns(['action','user_id','phone']);

        return $table->make(true);
    }
  
    public function show($id)
    {
        $item = $this->cartService->findOne($id);
        return view('cartmodule::admin.show',compact('item'));
    }

    
}
