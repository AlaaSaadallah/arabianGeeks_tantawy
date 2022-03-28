<?php

namespace Modules\CategoryModule\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CategoryModule\Services\CategoryService;
use Yajra\DataTables\Facades\DataTables;

class CategoryAdminController extends Controller
{
    public function __construct(
        CategoryService $categoryService
    ) {
        $this->categoryService = $categoryService;

    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('categorymodule::admin.index');
    }

    public function indexProducts(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $products = $this->categoryService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($products);
        $table->addColumn(
            'action',
            function ($products) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.products.edit', $products->id) . '" role="button"><i class="fa fa-pencil"></i>
            &nbsp;تعديل</a>';

                //     $button .= '<a class="btn btn-danger btn-sm" href="' .  '" role="button"><i class="fa fa-trash-o"></i>
                // &nbsp;حذف</a>';

                return $button;
            }
        );

        $table->addColumn('is_available', function ($products) {

            if ($products->is_available == 1) {
                $icon = '<i class="fa fa-check-circle check_icon text-success mr-5 fa-2x"></i>';
            } else {
                $icon =
                    '<i class="fa fa-times-circle-o text-danger fa-2x" aria-hidden="true"></i>';

                // '<i class="fas fa-times-circle check_icon t" aria-hidden="true"></i>';
            }
            return $icon;
        });
        $table->rawColumns(['action', 'is_available']);

        // <a href="edite_item.html" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
        // <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
        return $table->make(true);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('categorymodule::create');
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




    public function editProducts($id)
    {
        $category = $this->categoryService->findOne($id);
        // dd($paperType->name);
        return view('categorymodule::admin.edit', compact('category'));
    }

    public function updateProducts(Request $request)
    {
        $updated_data = $request->all();
        $update =  $this->categoryService->update($updated_data);
        //  dd($update->toArray());
        if ($update) {
            return redirect()->route('admin.products');
        } else {
            return redirect()->back();
        }
    }
   
}
