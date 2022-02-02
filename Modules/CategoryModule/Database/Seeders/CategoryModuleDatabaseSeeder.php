<?php

namespace Modules\CategoryModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\CategoryModule\Entities\Category;
use Modules\CategoryModule\Entities\CategoryColor;
use Modules\CategoryModule\Entities\CategoryCover;
use Modules\CategoryModule\Entities\CategoryCutStyle;
use Modules\CategoryModule\Entities\CategoryFinishOption;
use Modules\CategoryModule\Entities\CategoryFoldNumber;
use Modules\CategoryModule\Entities\CategoryFoldPocket;
use Modules\CategoryModule\Entities\CategoryGlue;
use Modules\CategoryModule\Entities\CategoryPaperSize;
use Modules\CategoryModule\Entities\CategoryPaperType;
use Modules\CategoryModule\Entities\CategoryPrintOption;
use Modules\CategoryModule\Entities\CategryCutStyle;
use Modules\CategoryModule\Entities\CategryFoldNumber;
use Modules\CategoryModule\Entities\CategryFoldPocket;
use Modules\CategoryModule\Entities\CategryGlue;

class CategoryModuleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('categories')->truncate();
        Category::create([
            'name' => "كروت شخصية",
        ]);
        Category::create([
            'name' => "بروشور",
        ]);
        Category::create([
            'name' => "فلاير",
        ]);
        Category::create([
            'name' => "مجلات",
        ]);
        Category::create([
            'name' => "كتب",
        ]);
        Category::create([
            'name' => "بلوك نوت",
        ]);
        Category::create([
            'name' => "ليتر هيد",
        ]);
        Category::create([
            'name' => "طباعة",
        ]);
        Category::create([
            'name' => "أظرف",
        ]);
        Category::create([
            'name' => "ملصقات",
        ]);
        Category::create([
            'name' => "فولدرات صغيرة",
        ]);
        Category::create([
            'name' => "فولدرات كبيرة",
        ]);
        Category::create([
            'name' => "روشتات",
        ]);
        Category::create([
            'name' => "دفاتر",
        ]);
        // *************************************************paper size***********************************************************

        DB::table('category_paper_size')->truncate();
      
        //    brochure
        CategoryPaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
        ]);
        CategoryPaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
        ]);
        CategoryPaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
        ]);
        CategoryPaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "22",
        ]);
        CategoryPaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
        ]);
        CategoryPaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
        ]);
        // large folder
        CategoryPaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "16",
        ]);
        CategoryPaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "3",
        ]);
        CategoryPaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
        ]);
        // small folder
        CategoryPaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "22",
        ]);
        CategoryPaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "17",
        ]);
        CategoryPaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
        ]);
        CategoryPaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "18",
        ]);
        // medical prescription
        CategoryPaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
        ]);
        CategoryPaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
        ]);
        CategoryPaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
        ]);
        CategoryPaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
        ]);
        CategoryPaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
        ]);
        CategoryPaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
        ]);
        // notebooks
        CategoryPaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
        ]);
        CategoryPaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
        ]);
        CategoryPaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
        ]);
        CategoryPaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
        ]);
        CategoryPaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
        ]);
        CategoryPaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
        ]);
        // letter head
        CategoryPaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
        ]);
        // envelope
        CategoryPaperSize::create([
            'category_id' => "9",
            'paper_size_id' => "26",
        ]);CategoryPaperSize::create([
            'category_id' => "9",
            'paper_size_id' => "27",
        ]);CategoryPaperSize::create([
            'category_id' => "9",
            'paper_size_id' => "28",
        ]);CategoryPaperSize::create([
            'category_id' => "9",
            'paper_size_id' => "29",
        ]);
        // *************************************************color***********************************************************

        DB::table('category_color')->truncate();
       
        //    brochure
        CategoryColor::create([
            'category_id' => "2",
            'color_id' => "1",
        ]);
        CategoryColor::create([
            'category_id' => "2",
            'color_id' => "2",
        ]);
        CategoryColor::create([
            'category_id' => "2",
            'color_id' => "3",
        ]);
        CategoryColor::create([
            'category_id' => "2",
            'color_id' => "4",
        ]);
        // small folder
        CategoryColor::create([
            'category_id' => "11",
            'color_id' => "1",
        ]);
        CategoryColor::create([
            'category_id' => "11",
            'color_id' => "2",
        ]);
        CategoryColor::create([
            'category_id' => "11",
            'color_id' => "3",
        ]);
        CategoryColor::create([
            'category_id' => "11",
            'color_id' => "4",
        ]);
        // large folder
        CategoryColor::create([
            'category_id' => "12",
            'color_id' => "1",
        ]);
        CategoryColor::create([
            'category_id' => "12",
            'color_id' => "2",
        ]);
        CategoryColor::create([
            'category_id' => "12",
            'color_id' => "3",
        ]);
        CategoryColor::create([
            'category_id' => "12",
            'color_id' => "4",
        ]);

        // *************************************************paper type***********************************************************

        DB::table('category_paper_type')->truncate();
        
        //   large folder
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "20",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "21",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "22",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "23",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "24",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "25",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "28",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "29",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "30",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "31",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "32",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "36",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "37",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "38",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "39",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "40",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "41",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "42",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "43",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "44",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "45",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "46",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "47",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "48",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "49",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "50",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "51",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "52",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "53",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "54",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "55",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "56",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "57",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "58",
        ]);
        CategoryPaperType::create([
            'category_id' => "12",
            'paper_type_id' => "59",
        ]);
        // small folder
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "20",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "21",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "22",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "23",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "24",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "25",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "28",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "29",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "30",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "31",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "32",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "36",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "37",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "38",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "39",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "40",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "41",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "42",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "43",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "44",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "45",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "46",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "47",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "48",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "49",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "50",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "51",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "52",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "53",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "54",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "55",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "56",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "57",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "58",
        ]);
        CategoryPaperType::create([
            'category_id' => "11",
            'paper_type_id' => "59",
        ]);
        // brochure
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "67",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "2",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "9",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "4",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "5",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "6",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "7",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "8",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "12",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "13",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "15",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "14",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "16",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "20",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "21",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "22",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "23",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "24",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "25",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "28",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "29",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "30",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "31",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "32",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "41",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "42",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "43",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "46",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "47",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "48",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "51",
        ]);
        CategoryPaperType::create([
            'category_id' => "2",
            'paper_type_id' => "52",
        ]);
        // medical prescription
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "1",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "3",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "4",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "5",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "6",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "7",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "8",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "9",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "12",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "13",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "14",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "15",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "16",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "20",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "21",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "22",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "23",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "24",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "25",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "66",
        ]);
        CategoryPaperType::create([
            'category_id' => "13",
            'paper_type_id' => "67",
        ]);
        // notebooks
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "1",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "3",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "4",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "5",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "6",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "7",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "8",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "9",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "12",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "13",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "14",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "15",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "16",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "20",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "21",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "22",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "23",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "24",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "25",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "66",
        ]);
        CategoryPaperType::create([
            'category_id' => "14",
            'paper_type_id' => "67",
        ]);
        // letter head
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "1",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "2",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "3",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "4",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "5",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "6",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "7",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "8",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "9",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "12",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "13",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "14",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "15",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "16",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "20",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "21",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "22",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "23",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "24",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "25",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "61",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "62",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "63",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "64",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "66",
        ]);
        CategoryPaperType::create([
            'category_id' => "7",
            'paper_type_id' => "67",
        ]);
        // envelope
        CategoryPaperType::create([
            'category_id' => "9",
            'paper_type_id' => "1",
        ]);
        CategoryPaperType::create([
            'category_id' => "9",
            'paper_type_id' => "2",
        ]);
        CategoryPaperType::create([
            'category_id' => "9",
            'paper_type_id' => "3",
        ]);

        // *************************************************print options***********************************************************

        DB::table('category_print_option')->truncate();

        // brochure
        CategoryPrintOption::create([
            'category_id' => "2",
            'print_option_id' => "1",
        ]);
        CategoryPrintOption::create([
            'category_id' => "2",
            'print_option_id' => "2",
        ]);
        // large folder
        CategoryPrintOption::create([
            'category_id' => "12",
            'print_option_id' => "1",
        ]);
        CategoryPrintOption::create([
            'category_id' => "12",
            'print_option_id' => "2",
        ]);
        CategoryPrintOption::create([
            'category_id' => "12",
            'print_option_id' => "3",
        ]);
        CategoryPrintOption::create([
            'category_id' => "12",
            'print_option_id' => "4",
        ]);
        // small folder
        CategoryPrintOption::create([
            'category_id' => "11",
            'print_option_id' => "1",
        ]);
        CategoryPrintOption::create([
            'category_id' => "11",
            'print_option_id' => "2",
        ]);
        CategoryPrintOption::create([
            'category_id' => "11",
            'print_option_id' => "3",
        ]);
        CategoryPrintOption::create([
            'category_id' => "11",
            'print_option_id' => "4",
        ]);
        // medical prescription
        CategoryPrintOption::create([
            'category_id' => "13",
            'print_option_id' => "1",
        ]);
        CategoryPrintOption::create([
            'category_id' => "14",
            'print_option_id' => "2",
        ]);
        // notebooks
        CategoryPrintOption::create([
            'category_id' => "13",
            'print_option_id' => "1",
        ]);
        CategoryPrintOption::create([
            'category_id' => "14",
            'print_option_id' => "2",
        ]);
        // Letter head
        CategoryPrintOption::create([
            'category_id' => "7",
            'print_option_id' => "1",
        ]);
        // envelope
        CategoryPrintOption::create([
            'category_id' => "9",
            'print_option_id' => "1",
        ]);

        // *************************************************cover***********************************************************

        DB::table('category_cover')->truncate();

        // small folder
        CategoryCover::create([
            'category_id' => "11",
            'cover_id' => "1",
        ]);
        CategoryCover::create([
            'category_id' => "11",
            'cover_id' => "2",
        ]);
        CategoryCover::create([
            'category_id' => "11",
            'cover_id' => "3",
        ]);
        CategoryCover::create([
            'category_id' => "11",
            'cover_id' => "4",
        ]);
        // large folder
        CategoryCover::create([
            'category_id' => "12",
            'cover_id' => "1",
        ]);
        CategoryCover::create([
            'category_id' => "12",
            'cover_id' => "2",
        ]);
        CategoryCover::create([
            'category_id' => "12",
            'cover_id' => "3",
        ]);
        CategoryCover::create([
            'category_id' => "12",
            'cover_id' => "4",
        ]);

        // *************************************************fold pocket***********************************************************

        DB::table('category_fold_pocket')->truncate();

        // small folder
        CategoryFoldPocket::create([
            'category_id' => "11",
            'fold_pocket_id' => "1",
        ]);
        CategoryFoldPocket::create([
            'category_id' => "11",
            'fold_pocket_id' => "2",
        ]);
        CategoryFoldPocket::create([
            'category_id' => "11",
            'fold_pocket_id' => "3",
        ]);
        CategoryFoldPocket::create([
            'category_id' => "11",
            'fold_pocket_id' => "4",
        ]);
        // large folder
        CategoryFoldPocket::create([
            'category_id' => "12",
            'fold_pocket_id' => "1",
        ]);
        CategoryFoldPocket::create([
            'category_id' => "12",
            'fold_pocket_id' => "2",
        ]);
        CategoryFoldPocket::create([
            'category_id' => "12",
            'fold_pocket_id' => "3",
        ]);
        CategoryFoldPocket::create([
            'category_id' => "12",
            'fold_pocket_id' => "4",
        ]);

        // *************************************************fold number***********************************************************

        DB::table('category_fold_number')->truncate();
        // small folder
        CategoryFoldNumber::create([
            'category_id' => "11",
            'fold_number_id' => "1",
        ]);
        // large folder
        CategoryFoldNumber::create([
            'category_id' => "12",
            'fold_number_id' => "1",
        ]);

        // *************************************************glue***********************************************************

        DB::table('category_glue')->truncate();
        // small folder
        CategoryGlue::create([
            'category_id' => "11",
            'glue_id' => "1",
        ]);
        CategoryGlue::create([
            'category_id' => "11",
            'glue_id' => "2",
        ]);
        // large folder
        CategoryGlue::create([
            'category_id' => "12",
            'glue_id' => "1",
        ]);
        CategoryGlue::create([
            'category_id' => "12",
            'glue_id' => "2",
        ]);

        // *************************************************cut style***********************************************************

        DB::table('category_cut_style')->truncate();
        // small folder
        CategoryCutStyle::create([
            'category_id' => "11",
            'cut_style_id' => "1",
        ]);
        CategoryCutStyle::create([
            'category_id' => "11",
            'cut_style_id' => "2",
        ]);
        // large folder
        CategoryCutStyle::create([
            'category_id' => "12",
            'cut_style_id' => "1",
        ]);
        CategoryCutStyle::create([
            'category_id' => "12",
            'cut_style_id' => "2",
        ]);
        // $this->call("OthersTableSeeder");
    }
}
