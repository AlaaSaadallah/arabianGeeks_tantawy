<?php

namespace Modules\OrderModule\Http\Controllers\user;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MaterialModule\Services\ColorService;
use Modules\MaterialModule\Services\PaperSizeService;
use Modules\MaterialModule\Services\PaperTypeService;

class OrderUserController extends Controller
{

    private $paperSizeService;
    public function __construct(PaperSizeService $paperSizeService, PaperTypeService $paperTypeService, ColorService $colorService)
    {
        $this->paperSizeService = $paperSizeService;
        $this->paperTypeService = $paperTypeService;
        $this->colorService = $colorService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('ordermodule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ordermodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // dd('jjjj');
        // dd($request->toArray());
        $paper_size = $this->paperSizeService->findOne($request->paper_size); // get chosen size data 
        $no_of_width_to_quarter = floor(50 / $paper_size->width); // العدد بالنسبة للعرض
        $no_of_height_to_quarter = floor(35 / $paper_size->height); //  العدد بالنسبه للطول
        $total_per_print_sheet =  $no_of_width_to_quarter * $no_of_height_to_quarter; // العدد الكلي في الفرخ الواحد
        $total_number_of_sheets = $request->quantity / $total_per_print_sheet; // عدد الافرخ(1/4) المستخدمة

        $paper_type = $this->paperTypeService->findOne($request->paper_type); // معرفة نوع الورق
        $standard_sheet_price = $paper_type->price; // تحديد سعر الورقة
        $total_sheets_price =  ($standard_sheet_price / 4) * $total_number_of_sheets; // حساب ثمن الورق كله

        $color_data = $this->colorService->findOne($request->colors);
        // تحديد عدد الزنجات
        if ($request->print_option == 1) {
            $zinkat = $request->colors * 30 ;
        }
        elseif ($request->print_option == 2) {
            $zinkat = $request->colors * 30 * 2;
        }
        $traj =  $total_number_of_sheets * $request->colors * $color_data->price;

        $shipping_fees = 20 ;
        if($total_number_of_sheets > 1000){
            $over_1000 = floor($total_number_of_sheets/1000)+1;
            // dd($over_1000);
            $shipping_fees += 10 ;
        }
        
        // dd($shipping_fees);

        $total_order_price = $total_sheets_price + $zinkat + $traj + $shipping_fees;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ordermodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ordermodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
