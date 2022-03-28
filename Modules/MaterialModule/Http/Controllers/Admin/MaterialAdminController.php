<?php

namespace Modules\MaterialModule\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MaterialModule\Entities\FinishOption;
use Modules\MaterialModule\Services\ColorsService;
use Modules\MaterialModule\Services\ConstantsService;
use Modules\MaterialModule\Services\CutStyleService;
use Modules\MaterialModule\Services\FinishDirectionService;
use Modules\MaterialModule\Services\FinishOptionService;
use Modules\MaterialModule\Services\GlueService;
use Modules\MaterialModule\Services\PaperSizeService;
use Modules\MaterialModule\Services\PaperTypeService;
use Modules\MaterialModule\Services\PrintOptionService;
use Modules\MaterialModule\Services\RegaService;
use Yajra\DataTables\Facades\DataTables;

class MaterialAdminController extends Controller
{
    public function __construct(
        PaperTypeService $paperTypeService,
        PaperSizeService $paperSizeService,
        PrintOptionService $printOptionService,
        ColorsService $colorsService,
        FinishOptionService $finishOptionService,
        FinishDirectionService $finishDirectionService,
        CutStyleService $cutStyleService,
        RegaService $regaService,
        GlueService $glueService,
        ConstantsService $constantsService
    ) {
        $this->paperTypeService = $paperTypeService;
        $this->paperSizeService = $paperSizeService;
        $this->printOptionService = $printOptionService;
        $this->colorsService = $colorsService;
        $this->finishOptionService = $finishOptionService;
        $this->finishDirectionService = $finishDirectionService;
        $this->cutStyleService = $cutStyleService;
        $this->regaService = $regaService;
        $this->glueService = $glueService;
        $this->constantsService = $constantsService;
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

    public function viewPaperSize()
    {
        return view('materialmodule::admin.paperSizes_index');
    }

    public function indexPaperSize(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $paperSizes = $this->paperSizeService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($paperSizes);
        $table->addColumn(
            'action',
            function ($paperSizes) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.material.paperSize.edit', $paperSizes->id) . '" role="button"><i class="fa fa-pencil"></i>
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

    public function editPaperSize($id)
    {
        $paperSize = $this->paperSizeService->findOne($id);
        // dd($paperType->name);
        return view('materialmodule::admin.paperSizes_edit', compact('paperSize'));
    }

    public function updatePaperSize(Request $request)
    {
        $updated_data = $request->all();
        $update =  $this->paperSizeService->update($updated_data);
        //  dd($update->toArray());
        if ($update) {
            return redirect()->route('admin.material.paperSize');
        } else {
            return redirect()->back();
        }
    }

    public function viewPrintOption()
    {
        return view('materialmodule::admin.printOptions_index');
    }

    public function indexPrintOption(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $printOptions = $this->printOptionService->getAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($printOptions);
        $table->addColumn(
            'action',
            function ($printOptions) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.material.printOption.edit', $printOptions->id) . '" role="button"><i class="fa fa-pencil"></i>
            &nbsp;تعديل</a>';

                //     $button .= '<a class="btn btn-danger btn-sm" href="' .  '" role="button"><i class="fa fa-trash-o"></i>
                // &nbsp;حذف</a>';

                return $button;
            }
        );

        $table->addColumn('is_available', function ($printOptions) {

            if ($printOptions->is_available == 1) {
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

    public function editPrintOption($id)
    {
        $printOption = $this->printOptionService->findOne($id);
        // dd($paperType->name);
        return view('materialmodule::admin.printOptions_edit', compact('printOption'));
    }

    public function updatePrintOption(Request $request)
    {
        $updated_data = $request->all();
        $update =  $this->printOptionService->update($updated_data);
        //  dd($update->toArray());
        if ($update) {
            return redirect()->route('admin.material.printOption');
        } else {
            return redirect()->back();
        }
    }

    public function viewColors()
    {
        return view('materialmodule::admin.colors_index');
    }

    public function indexColors(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $colors = $this->colorsService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($colors);
        $table->addColumn(
            'action',
            function ($colors) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.material.colors.edit', $colors->id) . '" role="button"><i class="fa fa-pencil"></i>
            &nbsp;تعديل</a>';

                //     $button .= '<a class="btn btn-danger btn-sm" href="' .  '" role="button"><i class="fa fa-trash-o"></i>
                // &nbsp;حذف</a>';

                return $button;
            }
        );

        $table->addColumn('is_available', function ($colors) {

            if ($colors->is_available == 1) {
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

    public function editColors($id)
    {
        $color = $this->colorsService->findOne($id);
        // dd($paperType->name);
        return view('materialmodule::admin.colors_edit', compact('color'));
    }

    public function updateColors(Request $request)
    {
        $updated_data = $request->all();
        $update =  $this->colorsService->update($updated_data);
        //  dd($update->toArray());
        if ($update) {
            return redirect()->route('admin.material.colors');
        } else {
            return redirect()->back();
        }
    }


    public function viewFinishOptions()
    {
        return view('materialmodule::admin.finishOptions_index');
    }

    public function indexFinishOptions(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $finishOption = $this->finishOptionService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($finishOption);
        $table->addColumn(
            'action',
            function ($finishOption) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.material.finishOptions.edit', $finishOption->id) . '" role="button"><i class="fa fa-pencil"></i>
            &nbsp;تعديل</a>';

                //     $button .= '<a class="btn btn-danger btn-sm" href="' .  '" role="button"><i class="fa fa-trash-o"></i>
                // &nbsp;حذف</a>';

                return $button;
            }
        );

        $table->addColumn('is_available', function ($finishOption) {

            if ($finishOption->is_available == 1) {
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

    public function editFinishOptions($id)
    {
        $finishOption = $this->finishOptionService->findOne($id);
        // dd($paperType->name);
        return view('materialmodule::admin.finishOptions_edit', compact('finishOption'));
    }

    public function updateFinishOptions(Request $request)
    {
        $updated_data = $request->all();
        $update =  $this->finishOptionService->update($updated_data);
        //  dd($update->toArray());
        if ($update) {
            return redirect()->route('admin.material.finishOptions');
        } else {
            return redirect()->back();
        }
    }

    public function viewFinishDirections()
    {
        return view('materialmodule::admin.finishDirections_index');
    }

    public function indexFinishDirections(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $finishDirection = $this->finishDirectionService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($finishDirection);
        $table->addColumn(
            'action',
            function ($finishDirection) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.material.finishDirections.edit', $finishDirection->id) . '" role="button"><i class="fa fa-pencil"></i>
            &nbsp;تعديل</a>';

                //     $button .= '<a class="btn btn-danger btn-sm" href="' .  '" role="button"><i class="fa fa-trash-o"></i>
                // &nbsp;حذف</a>';

                return $button;
            }
        );

        $table->addColumn('is_available', function ($finishDirection) {

            if ($finishDirection->is_available == 1) {
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

    public function editFinishDirections($id)
    {
        $finishDirection = $this->finishDirectionService->findOne($id);
        // dd($paperType->name);
        return view('materialmodule::admin.finishDirections_edit', compact('finishDirection'));
    }

    public function updateFinishDirections(Request $request)
    {
        $updated_data = $request->all();
        $update =  $this->finishDirectionService->update($updated_data);
        //  dd($update->toArray());
        if ($update) {
            return redirect()->route('admin.material.finishOptions');
        } else {
            return redirect()->back();
        }
    }


    public function viewCutStyle()
    {
        return view('materialmodule::admin.cutStyle_index');
    }

    public function indexCutStyle(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $cutStyle = $this->cutStyleService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($cutStyle);
        $table->addColumn(
            'action',
            function ($cutStyle) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.material.cutStyle.edit', $cutStyle->id) . '" role="button"><i class="fa fa-pencil"></i>
            &nbsp;تعديل</a>';

                //     $button .= '<a class="btn btn-danger btn-sm" href="' .  '" role="button"><i class="fa fa-trash-o"></i>
                // &nbsp;حذف</a>';

                return $button;
            }
        );

        $table->addColumn('is_available', function ($cutStyle) {

            if ($cutStyle->is_available == 1) {
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

    public function editCutStyle($id)
    {
        $cutStyle = $this->cutStyleService->findOne($id);
        // dd($paperType->name);
        return view('materialmodule::admin.cutStyle_edit', compact('cutStyle'));
    }

    public function updateCutStyle(Request $request)
    {
        $updated_data = $request->all();
        $update =  $this->cutStyleService->update($updated_data);
        //  dd($update->toArray());
        if ($update) {
            return redirect()->route('admin.material.cutStyle');
        } else {
            return redirect()->back();
        }
    }


    public function viewRega()
    {
        return view('materialmodule::admin.rega_index');
    }

    public function indexRega(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $rega = $this->regaService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($rega);
        $table->addColumn(
            'action',
            function ($rega) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.material.rega.edit', $rega->id) . '" role="button"><i class="fa fa-pencil"></i>
            &nbsp;تعديل</a>';

                //     $button .= '<a class="btn btn-danger btn-sm" href="' .  '" role="button"><i class="fa fa-trash-o"></i>
                // &nbsp;حذف</a>';

                return $button;
            }
        );

        $table->addColumn('is_available', function ($rega) {

            if ($rega->is_available == 1) {
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

    public function editRega($id)
    {
        $rega = $this->regaService->findOne($id);
        // dd($paperType->name);
        return view('materialmodule::admin.rega_edit', compact('rega'));
    }

    public function updateRega(Request $request)
    {
        $updated_data = $request->all();
        $update =  $this->regaService->update($updated_data);
        //  dd($update->toArray());
        if ($update) {
            return redirect()->route('admin.material.rega');
        } else {
            return redirect()->back();
        }
    }


    public function viewGlue()
    {
        return view('materialmodule::admin.glue_index');
    }

    public function indexGlue(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $rega = $this->glueService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($rega);
        $table->addColumn(
            'action',
            function ($rega) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.material.glue.edit', $rega->id) . '" role="button"><i class="fa fa-pencil"></i>
            &nbsp;تعديل</a>';

                //     $button .= '<a class="btn btn-danger btn-sm" href="' .  '" role="button"><i class="fa fa-trash-o"></i>
                // &nbsp;حذف</a>';

                return $button;
            }
        );

        $table->addColumn('is_available', function ($rega) {

            if ($rega->is_available == 1) {
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

    public function editGlue($id)
    {
        $glue = $this->glueService->findOne($id);
        // dd($paperType->name);
        return view('materialmodule::admin.glue_edit', compact('glue'));
    }

    public function updateGlue(Request $request)
    {
        $updated_data = $request->all();
        $update =  $this->glueService->update($updated_data);
        //  dd($update->toArray());
        if ($update) {
            return redirect()->route('admin.material.glue');
        } else {
            return redirect()->back();
        }
    }


    public function viewConstant()
    {
        return view('materialmodule::admin.constants_index');
    }

    public function indexConstant(Request $request)
    {
        if ($request->ajax()) {
            //  dd($request->all());
            $rega = $this->constantsService->findAll($request);  // get all auctions to be listed in datatable      

        }
        $table = DataTables::of($rega);
        $table->addColumn(
            'action',
            function ($rega) {
                $button = null;
                $button = '<a class="btn btn-info btn-sm" href="' . route('admin.material.constants.edit', $rega->id) . '" role="button"><i class="fa fa-pencil"></i>
            &nbsp;تعديل</a>';

                //     $button .= '<a class="btn btn-danger btn-sm" href="' .  '" role="button"><i class="fa fa-trash-o"></i>
                // &nbsp;حذف</a>';

                return $button;
            }
        );

        // $table->addColumn('is_available', function ($rega) {

        //     if ($rega->is_available == 1) {
        //         $icon = '<i class="fa fa-check-circle check_icon text-success mr-5 fa-2x"></i>';
        //     } else {
        //         $icon =
        //             '<i class="fa fa-times-circle-o text-danger fa-2x" aria-hidden="true"></i>';

        //         // '<i class="fas fa-times-circle check_icon t" aria-hidden="true"></i>';
        //     }
        //     return $icon;
        // });
        $table->rawColumns(['action']);

        // <a href="edite_item.html" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
        // <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
        return $table->make(true);
    }

    public function editConstant($id)
    {
        $constant = $this->constantsService->findOne($id);
        // dd($paperType->name);
        return view('materialmodule::admin.constants_edit', compact('constant'));
    }

    public function updateConstant(Request $request)
    {
        $updated_data = $request->all();
        $update =  $this->constantsService->update($updated_data);
        //  dd($update->toArray());
        if ($update) {
            return redirect()->route('admin.material.constants');
        } else {
            return redirect()->back();
        }
    }
}
