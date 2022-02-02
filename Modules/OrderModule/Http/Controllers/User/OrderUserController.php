<?php

namespace Modules\OrderModule\Http\Controllers\user;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MaterialModule\Entities\PaperSize;
use Modules\MaterialModule\Services\PaperSizeService;
use Modules\MaterialModule\Services\PaperTypeService;
use Modules\OrderModule\Services\OrderService;

use function PHPUnit\Framework\assertIsFloat;

class OrderUserController extends Controller
{

    private $paperSizeService;
    public function __construct(OrderService $orderService, PaperSizeService $paperSizeService, PaperTypeService $paperTypeService)
    {
        $this->orderService = $orderService;
        $this->paperSizeService = $paperSizeService;
        $this->paperTypeService = $paperTypeService;
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

    // filter dropdown menu
    public function filterPaperTypes($id)
    {
        $selected_size = $this->paperSizeService->findOne($id);
        // dd($selected_size);
        $filtered_types =  $selected_size->paperTypesForSize->toArray();
        return $filtered_types;
    }
}
