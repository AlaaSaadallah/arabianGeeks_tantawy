<?php

namespace Modules\MaterialModule\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MaterialModule\Services\PaperTypeService;
use Yajra\DataTables\Facades\DataTables;

class MaterialAdminController extends Controller
{
    public function __construct(
        PaperTypeService $paperTypeService
    ) {
        $this->paperTypeService = $paperTypeService;
    }
    public function viewPaperType()
    {
        return view('materialmodule::admin.paperTypes_index');
    }

    public function indexPaperType(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $paperTypes = $this->paperTypeService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($paperTypes);
        $table->addColumn(
            'action',
            function ($paperTypes) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.material.paperType.edit', $paperTypes->id) . '" role="button"><i class="fa fa-pencil"></i>
            &nbsp;تعديل</a>';

                //     $button .= '<a class="btn btn-danger btn-sm" href="' .  '" role="button"><i class="fa fa-trash-o"></i>
                // &nbsp;حذف</a>';

                return $button;
            }
        );

        $table->addColumn('is_available', function ($paperTypes) {

            if ($paperTypes->is_available == 1) {
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

    public function editPaperType($id)
    {
        $paperType = $this->paperTypeService->findOne($id);
        // dd($paperType->name);
        return view('materialmodule::admin.paperTypes_edit', compact('paperType'));
    }

    public function updatePaperType(Request $request)
    {
        $updated_data = $request->all();
        $update =  $this->paperTypeService->update($updated_data);
        //  dd($update->toArray());
        if ($update) {
            return redirect()->route('admin.material.paperType');
        } else {
            return redirect()->back();
        }
    }
}
