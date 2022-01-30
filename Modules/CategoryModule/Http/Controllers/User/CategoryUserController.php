<?php

namespace Modules\CategoryModule\Http\Controllers\user;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CategoryModule\Entities\Category;
use Modules\CategoryModule\Services\CategoryService;

class CategoryUserController extends Controller
{

    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('categorymodule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function createBrochure()
    {
        $category = Category::firstWhere('id', 2);
        // $category=  $this->categoryService->findWhere(['id' => 2])->first(); // get all main categories for count in blade
        // dd($category->colors);
        // $sizes = $category->paperSizes;
        // foreach($sizes as $size){
        //     foreach($size->paperTypesForSize as $type){
                
        //         dd($type->name);
        //     }
        // }
// dd($x );
        return view('ordermodule::user.create_brochure',compact('category'));
    }
    public function createSmallFolder()
    {
        $category = Category::firstWhere('id', 11);
        return view('ordermodule::user.create_small_folder',compact('category'));
    }
    public function createLargeFolder()
    {
        $category = Category::firstWhere('id', 12);
        // dd($category);
        return view('ordermodule::user.create_large_folder',compact('category'));
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
        return view('categorymodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('categorymodule::edit');
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