<?php

namespace Modules\LocationModule\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\LocationModule\Services\CityService;
use Modules\CustomerModule\Services\CustomerService;
use Yajra\DataTables\Facades\DataTables;
class CityAdminController extends Controller
{

    public function __construct(
        CityService $cityService
    ) {
        $this->cityService = $cityService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('locationmodule::admin.index');
    }


    public function indexCities(Request $request)
    {
        // dd('ff');
        if ($request->ajax()) {
            //  dd($request->all());
            $cities = $this->cityService->findAll($request);  // get all auctions to be listed in datatable      

        }
        // dd($cities);
        $table = DataTables::of($cities);
        return $table->make(true);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('locationmodule::admin.create');
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
        return view('locationmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('locationmodule::edit');
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
