<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CartModule\Services\CartService;
use Modules\CategoryModule\Services\CategoryService;
use Modules\CustomerModule\Services\CustomerService;
use Modules\LocationModule\Services\CityService;

class AdminModuleController extends Controller
{
    public function __construct(
        CustomerService $customerService,
        CategoryService $categoryService,
        CityService $cityService,
        CartService $cartService

    ) {
        $this->customerService = $customerService;
        $this->categoryService = $categoryService;
        $this->cityService = $cityService;
        $this->cartService = $cartService;

    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $clients= $this->customerService->findAll();  // get all auctions to be listed in datatable      
        $categories= $this->categoryService->findAll();  // get all auctions to be listed in datatable      
        $orders= $this->cartService->findAll();  // get all auctions to be listed in datatable      
        $cities= $this->cityService->findAll();  // get all auctions to be listed in datatable      

        return view('adminmodule::index',compact('clients','categories','orders','cities'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('adminmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('adminmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('adminmodule::edit');
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
