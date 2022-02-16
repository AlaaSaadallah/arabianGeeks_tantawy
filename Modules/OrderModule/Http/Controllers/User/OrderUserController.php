<?php

namespace Modules\OrderModule\Http\Controllers\user;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MaterialModule\Entities\PaperSize;
use Modules\MaterialModule\Services\PaperSizePaperTypeService;
use Modules\MaterialModule\Services\PaperSizeService;
use Modules\MaterialModule\Services\PaperTypeService;
use Modules\OrderModule\Services\OrderService;

use function PHPUnit\Framework\assertIsFloat;

class OrderUserController extends Controller
{

    private $paperSizeService;
    public function __construct(OrderService $orderService, PaperSizeService $paperSizeService, PaperTypeService $paperTypeService, PaperSizePaperTypeService $paperSizePaperTypeService)
    {
        $this->orderService = $orderService;
        $this->paperSizeService = $paperSizeService;
        $this->paperTypeService = $paperTypeService;
        $this->paperSizePaperTypeService = $paperSizePaperTypeService;

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
    public function storeBrochure(Request $request)
    {

        // dd($request->toArray());

        $this->orderService->createBrochureOrder($request->all());
    }

    public function storeLargeFolder(Request $request)
    {
        $this->orderService->createLargeFolder($request->all());
    }

    public function storeFlyer(Request $request)
    {
        $this->orderService->createFlyer($request->all());
    }

    // letterhead
    public function storeLetterhead(Request $request)
    {
        $this->orderService->createLetterhead($request->all());
    }


    // sticker
    public function storeSticker(Request $request)
    {
        $this->orderService->createSticker($request->all());
    }

    // block note
    public function storeBlocknote(Request $request)
    {
        $this->orderService->createBlocknote($request->all());
    }

    // prescription
    public function storePrescription(Request $request)
    {
        $this->orderService->createPrescription($request->all());
    }


    // envelope
    public function storeEnvelope(Request $request)
    {
        $this->orderService->createEnvelope($request->all());
    }


      // copybook
      public function storeCopybook(Request $request)
      {
          $this->orderService->createcopybook($request->all());
      }


    // filter dropdown menu
    public function filterPaperTypes($cat_id,$size_id)
    { 
    //    dd($cat_id);
        // dd('55');
        $selected_size = $this->paperSizePaperTypeService->findWhere(['paper_size_id'=>$size_id, 'category_id'=>$cat_id])->toArray();
        // dd($selected_size->toArray());
        $filtered_types =[];
        foreach($selected_size as $size){
            // dd($size['paper_type_id']);
            $filtered_types[$size['id']]['type_id'] =  $size['paper_type_id'];
        }
        $types=[];
        $i =1;
        foreach($filtered_types as $type){
            // dd(( $this->paperTypeService->findWhere(['id'=>$type['type_id']])->first()->toArray()));
            $types[$i]= $this->paperTypeService->findWhere(['id'=>$type['type_id']])->first()->toArray();
            $i ++;
        }
// dd($types);
        // $selected_size->paperTypesForSize->toArray();
        // dd(($filtered_types));
        return $types;
    }
}
