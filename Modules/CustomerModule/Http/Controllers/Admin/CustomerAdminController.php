<?php

namespace Modules\CustomerModule\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CustomerModule\Services\CustomerService;
use Modules\LocationModule\Services\CityService;
use Yajra\DataTables\Facades\DataTables;


class CustomerAdminController extends Controller
{
    public function __construct(
        CustomerService $customerService,
        CityService $cityService
    ) {
        $this->customerService = $customerService;
        $this->cityService = $cityService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('customermodule::admin.index');
    }
    public function indexCustomers(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $customers = $this->customerService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($customers);

        $table->addColumn(
            'action',
            function ($customers) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.customers.edit', $customers->id) . '" role="button"><i class="fa fa-pencil"></i>
            &nbsp;تعديل</a>';

                //     $button .= '<a class="btn btn-danger btn-sm" href="' .  '" role="button"><i class="fa fa-trash-o"></i>
                // &nbsp;حذف</a>';

                return $button;
            }
        );
        $table->rawColumns(['action']);

        return $table->make(true);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $cities = $this->cityService->findAll();
        return view('customermodule::admin.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $customer = $this->customerService->create($request->all());
        if ($customer) {
            return redirect()->route('admin.customers');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('customermodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $customer= $this->customerService->findOne($id);
        $cities = $this->cityService->findAll();
        return view('customermodule::admin.edit',compact('customer','cities'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
       $customer= $this->customerService->update($request->all(),$request->id);
       if($customer){
           return redirect()->route('admin.customers');
       }else{
           return redirect()->back();
       }
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
