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

    public function createBlocknote()
    {
        $category = Category::firstWhere('id', 6);
        return view('ordermodule::user.create_blocknote', compact('category'));
    }

    public function createBook()
    {
        $category = Category::firstWhere('id', 5);
        return view('ordermodule::user.create_book', compact('category'));
    }

    public function createBrochure()
    {
        $category = Category::firstWhere('id', 2);
        return view('ordermodule::user.create_brochure', compact('category'));
    }

    public function createCalender()
    {
        $category = Category::firstWhere('id', 16);
        return view('ordermodule::user.create_calender', compact('category'));
    }

    public function createCopybook()
    {
        $category = Category::firstWhere('id', 14);
        return view('ordermodule::user.create_copybook', compact('category'));
    }

    public function createEnvelope()
    {
        $category = Category::firstWhere('id', 9);
        return view('ordermodule::user.create_envelope', compact('category'));
    }
    public function createFlyer()
    {
        $category = Category::firstWhere('id', 3);
        return view('ordermodule::user.create_flyer', compact('category'));
    }
    public function createLargeFolder()
    {
        $category = Category::firstWhere('id', 12);
        return view('ordermodule::user.create_large_folder', compact('category'));
    }
    public function createLetterhead()
    {
        $category = Category::firstWhere('id', 7);
        return view('ordermodule::user.create_letterhead', compact('category'));
    }
    public function createMagazine()
    {
        $category = Category::firstWhere('id', 4);
        return view('ordermodule::user.create_magazine', compact('category'));
    }
    public function createPrescription()
    {
        $category = Category::firstWhere('id', 13);
        return view('ordermodule::user.create_prescription', compact('category'));
    }
    public function createRamadan()
    {
        $category = Category::firstWhere('id', 15);
        return view('ordermodule::user.create_ramadan', compact('category'));
    }
    public function createSmallFolder()
    {
        $category = Category::firstWhere('id', 11);
        return view('ordermodule::user.create_small_folder', compact('category'));
    }

    public function createSticker()
    {
        $category = Category::firstWhere('id', 10);
        return view('ordermodule::user.create_sticker', compact('category'));
    }
}
