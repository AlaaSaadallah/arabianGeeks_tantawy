<?php

namespace Modules\CategoryModule\Http\Controllers\user;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CategoryModule\Entities\Category;
use Modules\CategoryModule\Services\CategoryService;
use Modules\MaterialModule\Entities\PaperTypePaperSize;
use Modules\MaterialModule\Services\PaperSizePaperTypeService;
use Modules\MaterialModule\Services\PaperTypeService;

class CategoryUserController extends Controller
{

    private $categoryService;
    public function __construct(CategoryService $categoryService, PaperTypeService $paperTypeService, PaperSizePaperTypeService $paperSizePaperTypeService)
    {
        $this->categoryService = $categoryService;
        $this->paperTypeService = $paperTypeService;
        $this->paperSizePaperTypeService = $paperSizePaperTypeService;
    }

    public function createBlocknote()
    {
        $category = Category::firstWhere('id', 6);
        $selected_size = $this->paperSizePaperTypeService->findWhere(['paper_size_id' => 22, 'category_id' => 4])->toArray();
        $filtered_types = [];
        foreach ($selected_size as $size) {
            $hide = [67, 2, 9, 5, 6, 7, 8, 14, 15, 16];
            if (in_array($size['paper_type_id'], $hide)) {
                continue;
            }
            $filtered_types[$size['id']]['type_id'] =  $size['paper_type_id'];
        }
        $cover_types = [];
        $i = 1;
        foreach ($filtered_types as $type) {
            $cover_types[$i] = $this->paperTypeService->findWhere(['id' => $type['type_id']])->first()->toArray();
            $i++;
        }
        return view('categorymodule::user.create_blocknote', compact('category', 'cover_types'));
    }

    public function createBook()
    {
        $category = Category::firstWhere('id', 5);
        return view('categorymodule::user.create_book', compact('category'));
    }

    public function createBrochure()
    {
        $category = Category::firstWhere('id', 2);
        return view('categorymodule::user.create_brochure', compact('category'));
    }

    public function createCalender()
    {
        $category = Category::firstWhere('id', 16);
        return view('categorymodule::user.create_calender', compact('category'));
    }

    public function createCopybook()
    {
        $category = Category::firstWhere('id', 14);
        return view('categorymodule::user.create_copybook', compact('category'));
    }

    public function createEnvelope()
    {
        $category = Category::firstWhere('id', 9);
        return view('categorymodule::user.create_envelope', compact('category'));
    }
    public function createFlyer()
    {
        $category = Category::firstWhere('id', 3);
        return view('categorymodule::user.create_flyer', compact('category'));
    }
    public function createLargeFolder()
    {
        $category = Category::firstWhere('id', 12);
        return view('categorymodule::user.create_large_folder', compact('category'));
    }
    public function createLetterhead()
    {
        $category = Category::firstWhere('id', 7);
        return view('categorymodule::user.create_letterhead', compact('category'));
    }
    public function createMagazine()
    {
        $category = Category::firstWhere('id', 4);
        return view('categorymodule::user.create_magazine', compact('category'));
    }
    public function createPrescription()
    {
        $category = Category::firstWhere('id', 13);
        return view('categorymodule::user.create_prescription', compact('category'));
    }
    public function createRamadan()
    {
        $category = Category::firstWhere('id', 15);
        return view('categorymodule::user.create_ramadan', compact('category'));
    }
    public function createSmallFolder()
    {
        $category = Category::firstWhere('id', 11);
        return view('categorymodule::user.create_small_folder', compact('category'));
    }

    public function createSticker()
    {
        $category = Category::firstWhere('id', 10);
        return view('categorymodule::user.create_sticker', compact('category'));
    }
}
