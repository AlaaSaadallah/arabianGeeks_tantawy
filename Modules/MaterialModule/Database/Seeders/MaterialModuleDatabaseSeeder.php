<?php

namespace Modules\MaterialModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\MaterialModule\Entities\Color;
use Modules\MaterialModule\Entities\Cover;
use Modules\MaterialModule\Entities\CutStyle;
use Modules\MaterialModule\Entities\FinishDirection;
use Modules\MaterialModule\Entities\FinishOption;
use Modules\MaterialModule\Entities\FlodPocket;
use Modules\MaterialModule\Entities\FoldNumber;
use Modules\MaterialModule\Entities\FoldPocket;
use Modules\MaterialModule\Entities\Glue;
use Modules\MaterialModule\Entities\PaperSize;
use Modules\MaterialModule\Entities\PaperType;
use Modules\MaterialModule\Entities\PrintOption;

class MaterialModuleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('colors')->truncate();
        Color::create([
            'name' => "1 لون",
        ]);
        Color::create([
            'name' => "2 لون",
        ]);
        Color::create([
            'name' => "3 لون",
        ]);
        Color::create([
            'name' => "4 لون",
        ]);

        DB::table('print_options')->truncate();
        PrintOption::create([
            'name' => "وجه فقط",
        ]);
        PrintOption::create([
            'name' => "وجه و ضهر",
        ]);

        DB::table('paper_sizes')->truncate();
        PaperSize::create([
            'name' => "الفرخ",
            'width' => '100',
            'height' => '70',
        ]);
        PaperSize::create([
            'name' => "نص الفرخ",
            'width' => '50',
            'height' => '70',
        ]);
        PaperSize::create([
            'name' => "ربع الفرخ",
            'width' => '33.5',
            'height' => '48.5',
        ]);
        PaperSize::create([
            'name' => "ثمن الفرخ",
            'width' => '24.25',
            'height' => '33.5',

        ]);
        PaperSize::create([
            'name' => "نص ثمن الفرخ",
            'width' => '16.75',
            'height' => '24.25',

        ]);
        PaperSize::create([
            'name' => "ربع ثمن الفرخ",
            'width' => '12.12',
            'height' => '16.75',

        ]);
        PaperSize::create([
            'name' => "خمس الفرخ",
            'width' => '28.5',
            'height' => '38.5',

        ]);
        PaperSize::create([
            'name' => "نص خمس الفرخ",
            'width' => '19.25',
            'height' => '28.5',

        ]);
        PaperSize::create([
            'name' => "ربع خمس الفرخ",
            'width' => '14',
            'height' => '19.25',

        ]);
        PaperSize::create([
            'name' => "سدس الفرخ",
            'width' => '21.5',
            'height' => '48.5',

        ]);
        PaperSize::create([
            'name' => "نص سدس الفرخ-عرض",
            'width' => '21.5',
            'height' => '24.25',

        ]);
        PaperSize::create([
            'name' => "نص سدس الفرخ-طول",
            'width' => '12.25',
            'height' => '21.5',

        ]);
        PaperSize::create([
            'name' => "11 حته",
            'width' => '18.5',
            'height' => '28.5',

        ]);
        PaperSize::create([
            'name' => "تسع الفرخ",
            'width' => '21.25',
            'height' => '31.5',

        ]);
        PaperSize::create([
            'name' => "دبل تسعات",
            'width' => '31.5',
            'height' => '44.5',

        ]);
        PaperSize::create([
            'name' => "a3",
            'width' => '29.7',
            'height' => '42',

        ]);
        PaperSize::create([
            'name' => "a4",
            'width' => '21',
            'height' => '29.7',

        ]);
        PaperSize::create([
            'name' => "a5",
            'width' => '15',
            'height' => '21',

        ]);
        PaperSize::create([
            'name' => "a6",
            'width' => '10',
            'height' => '15',

        ]);
        PaperSize::create([
            'name' => "ربع الجاير الطبع",
            'width' => '29.7',
            'height' => '42',

        ]);
        PaperSize::create([
            'name' => "ربع الجاير الكوشيه",
            'width' => '31.5',
            'height' => '42.5',

        ]);

        DB::table('paper_types')->truncate();
        PaperType::create([
            'name' => "100 جرام جاير طبع",
            'width' => '60',
            'height' => '84',
            'price' => '1.45',
        ]);
        PaperType::create([
            'name' => "100 جرام طبع سرينا",
            'width' => '70',
            'height' => '100',
            'price' => '1.88',
        ]);
        PaperType::create([
            'name' => "100 جرام كلاريانا",
            'width' => '70',
            'height' => '100',
            'price' => '3.20',
        ]);
        PaperType::create([
            'name' => "115 جرام جاير لامع اوروبي",
            'width' => '66',
            'height' => '88',
            'price' => '2.00',
        ]);
        PaperType::create([
            'name' => "115 جرام جاير لامع صيني",
            'width' => '70',
            'height' => '100',
            'price' => '2.30',
        ]);
        PaperType::create([
            'name' => "115 جرام لامع صيني",
            'width' => '70',
            'height' => '100',
            'price' => '2.57',
        ]);
        PaperType::create([
            'name' => "115 جرام مط اوروبي",
            'width' => '70',
            'height' => '100',
            'price' => '2.45',
        ]);
        PaperType::create([
            'name' => "115 جرام مط صيني",
            'width' => '70',
            'height' => '100',
            'price' => '2.05',
        ]);
        PaperType::create([
            'name' => "120 جرام طبع سرينا",
            'width' => '70',
            'height' => '100',
            'price' => '2.25',
        ]);
        PaperType::create([
            'name' => "130 جرام بريستول",
            'width' => '70',
            'height' => '100',
            'price' => '2.20',
        ]);
        PaperType::create([
            'name' => "130 جرام بريستول ازرق",
            'width' => '70',
            'height' => '100',
            'price' => '2.70',
        ]);
        PaperType::create([
            'name' => "130 جرام جاير لامع اووروبي",
            'width' => '66',
            'height' => '88',
            'price' => '2.45',
        ]);
        PaperType::create([
            'name' => "130 جرام جاير لامع صيني",
            'width' => '66',
            'height' => '88',
            'price' => '2.45',
        ]);
        PaperType::create([
            'name' => "130 جرام لامع صيني",
            'width' => '70',
            'height' => '100',
            'price' => '2.80',
        ]);
        PaperType::create([
            'name' => "130 جرام مط صيني",
            'width' => '70',
            'height' => '100',
            'price' => '2.80',
        ]);
        PaperType::create([
            'name' => "130 جرام مط اوروبي",
            'width' => '70',
            'height' => '100',
            'price' => '2.80',
        ]);
        PaperType::create([
            'name' => "140 بريستول الوان",
            'width' => '70',
            'height' => '100',
            'price' => '2.20',
        ]);
        PaperType::create([
            'name' => "140 جرام بريستول ابيض",
            'width' => '70',
            'height' => '100',
            'price' => '2.65',
        ]);
        PaperType::create([
            'name' => "140 جرام مانيلا",
            'width' => '70',
            'height' => '100',
            'price' => '1.65',
        ]);
        PaperType::create([
            'name' => "150 جرام جاير لامع اوروبي",
            'width' => '66',
            'height' => '88',
            'price' => '2.80',
        ]);
        PaperType::create([
            'name' => "150 جرام جاير لامع صيني",
            'width' => '66',
            'height' => '88',
            'price' => '2.95',
        ]);
        PaperType::create([
            'name' => "150 جرام جاير مط صيني",
            'width' => '66',
            'height' => '88',
            'price' => '2.74',
        ]);
        PaperType::create([
            'name' => "150 جرام لامع صيني",
            'width' => '70',
            'height' => '100',
            'price' => '3.26',
        ]);
        PaperType::create([
            'name' => "150 جرام مط اوروبي",
            'width' => '70',
            'height' => '100',
            'price' => '3.10',
        ]);
        PaperType::create([
            'name' => "150 جرام مط صيني",
            'width' => '70',
            'height' => '100',
            'price' => '2.65',
        ]);
        PaperType::create([
            'name' => "180 جرام بريستول",
            'width' => '70',
            'height' => '100',
            'price' => '3.10',
        ]);
        PaperType::create([
            'name' => "180 جرام مانيلا",
            'width' => '70',
            'height' => '100',
            'price' => '2.00',
        ]);
        PaperType::create([
            'name' => "200 جرام جاير لامع اوروبي",
            'width' => '66',
            'height' => '88',
            'price' => '3.90',
        ]);
        PaperType::create([
            'name' => "200 جرام جاير لامع صيني",
            'width' => '66',
            'height' => '88',
            'price' => '4.05',
        ]);
        PaperType::create([
            'name' => "200 جرام لامع اوروبي",
            'width' => '70',
            'height' => '100',
            'price' => '4.40',
        ]);
        PaperType::create([
            'name' => "200 جرام لامع صيني",
            'width' => '70',
            'height' => '100',
            'price' => '4.52',
        ]);
        PaperType::create([
            'name' => "200 جرام مط اوروبي",
            'width' => '70',
            'height' => '100',
            'price' => '4.50',
        ]);
        PaperType::create([
            'name' => "230 جرام بريستول ابيض",
            'width' => '70',
            'height' => '100',
            'price' => '3.60',
        ]);
        PaperType::create([
            'name' => "230 جرام بريستول ازرق",
            'width' => '70',
            'height' => '100',
            'price' => '3.75',
        ]);
        PaperType::create([
            'name' => "230 جرام لامع صيني",
            'width' => '70',
            'height' => '100',
            'price' => '2.70',
        ]);
        PaperType::create([
            'name' => "250 جرام بريستول",
            'width' => '70',
            'height' => '100',
            'price' => '4.25',
        ]);
        PaperType::create([
            'name' => "250 جرام بريستول كوشيه",
            'width' => '70',
            'height' => '100',
            'price' => '6.55',
        ]);
        PaperType::create([
            'name' => "250 جرام بريستول كوشيه فنلندي",
            'width' => '70',
            'height' => '100',
            'price' => '5.25',
        ]);
        PaperType::create([
            'name' => "250 جرام جاير لامع صيني",
            'width' => '66',
            'height' => '88',
            'price' => '5.05',
        ]);
        PaperType::create([
            'name' => "250 جرام دوبليكس",
            'width' => '70',
            'height' => '100',
            'price' => '3.95',
        ]);
        PaperType::create([
            'name' => "250 جرام لامع صيني",
            'width' => '70',
            'height' => '100',
            'price' => '5.95',
        ]);
        PaperType::create([
            'name' => "250 جرام مط اوروبي",
            'width' => '70',
            'height' => '100',
            'price' => '5.85',
        ]);
        PaperType::create([
            'name' => "250 جرام مط صيني",
            'width' => '70',
            'height' => '100',
            'price' => '5.89',
        ]);
        PaperType::create([
            'name' => "300 جرام بريستول ابيض",
            'width' => '70',
            'height' => '100',
            'price' => '5.00',
        ]);
        PaperType::create([
            'name' => "300 جرام بريستول كوشيه",
            'width' => '70',
            'height' => '100',
            'price' => '7.25',
        ]);
        PaperType::create([
            'name' => "300 جرام جاير لامع اوروبي",
            'width' => '66',
            'height' => '88',
            'price' => '5.95',
        ]);
        PaperType::create([
            'name' => "300 جرام جاير لامع صيني",
            'width' => '66',
            'height' => '88',
            'price' => '5.75',
        ]);
        PaperType::create([
            'name' => "300 جرام جاير مط اوروبي",
            'width' => '66',
            'height' => '88',
            'price' => '5.75',
        ]);
        PaperType::create([
            'name' => "300 جرام دوبليكس",
            'width' => '70',
            'height' => '100',
            'price' => '4.50',
        ]);
        PaperType::create([
            'name' => "300 جرام لامع اندونيسي",
            'width' => '70',
            'height' => '100',
            'price' => '6.75',
        ]);
        PaperType::create([
            'name' => "300 جرام لامع صيني",
            'width' => '70',
            'height' => '100',
            'price' => '7.05',
        ]);
        PaperType::create([
            'name' => "300 جرام مط صيني",
            'width' => '70',
            'height' => '100',
            'price' => '6.66',
        ]);
        PaperType::create([
            'name' => "350 جرام جاير لامع صيني",
            'width' => '66',
            'height' => '88',
            'price' => '6.00',
        ]);
        PaperType::create([
            'name' => "350 جرام دوبليكس",
            'width' => '70',
            'height' => '100',
            'price' => '4.25',
        ]);
        PaperType::create([
            'name' => "350 جرام لامع اندونيسي",
            'width' => '70',
            'height' => '100',
            'price' => '7.75',
        ]);
        PaperType::create([
            'name' => "350 جرام لامع اوروبي",
            'width' => '70',
            'height' => '100',
            'price' => '6.00',
        ]);
        PaperType::create([
            'name' => "350 جرام لامع صيني",
            'width' => '70',
            'height' => '100',
            'price' => '7.75',
        ]);
        PaperType::create([
            'name' => "350 جرام مط اوروبي",
            'width' => '70',
            'height' => '100',
            'price' => '7.81',
        ]);
        PaperType::create([
            'name' => "350 جرام مط صيني",
            'width' => '70',
            'height' => '100',
            'price' => '8.10',
        ]);
        PaperType::create([
            'name' => "380 جرام لامع اوروبي",
            'width' => '70',
            'height' => '100',
            'price' => '7.80',
        ]);
        PaperType::create([
            'name' => "60 جرام جاير طبع",
            'width' => '60',
            'height' => '84',
            'price' => '0.90',
        ]);
        PaperType::create([
            'name' => "60 جرام طبع",
            'width' => '70',
            'height' => '100',
            'price' => '1.15',
        ]);
        PaperType::create([
            'name' => "70 جرام جاير طبع",
            'width' => '60',
            'height' => '84',
            'price' => '1.07',
        ]);
        PaperType::create([
            'name' => "70 جرام طبع",
            'width' => '70',
            'height' => '100',
            'price' => '1.31',
        ]);
        PaperType::create([
            'name' => "75 جرام ازوريه",
            'width' => '70',
            'height' => '100',
            'price' => '1.50',
        ]);
        PaperType::create([
            'name' => "80 جرام جاير طبع",
            'width' => '60',
            'height' => '84',
            'price' => '1.10',
        ]);
        PaperType::create([
            'name' => "80 جرام طبع سرينا",
            'width' => '70',
            'height' => '100',
            'price' => '1.54',
        ]);
        PaperType::create([
            'name' => "استيكر ae",
            'width' => '70',
            'height' => '100',
            'price' => '6.08',
        ]);
        PaperType::create([
            'name' => "استيكر اسباني",
            'width' => '70',
            'height' => '100',
            'price' => '10.25',
        ]);
        PaperType::create([
            'name' => "كرفت",
            'width' => '85',
            'height' => '110',
            'price' => '1.55',
        ]);
        PaperType::create([
            'name' => "كريمى",
            'width' => '70',
            'height' => '100',
            'price' => '3.20',
        ]);
        PaperType::create([
            'name' => "مظروف غزاله عادي DL",
            'width' => '11',
            'height' => '22',
            'price' => '0.22',
        ]);
        PaperType::create([
            'name' => "مظروف غزاله لزق ذاتي DL",
            'width' => '11',
            'height' => '22',
            'price' => '0.40',
        ]);
        PaperType::create([
            'name' => "مكربن",
            'price' => '1.49',
        ]);
        PaperType::create([
            'name' => "مكربن وسط",


            'price' => '1.68',
        ]);
        PaperType::create([
            'name' => "ورق بورشمان",
            'width' => '70',
            'height' => '100',
            'price' => '1.25',
        ]);
        PaperType::create([
            'name' => "ورق زبده",


            'price' => '0.85',
        ]);


        DB::table('finish_options')->truncate();
        FinishOption::create([
            'name' => "غراء",
        ]);
        FinishOption::create([
            'name' => "دبوس",
        ]);
        FinishOption::create([
            'name' => "سلك",
        ]);

        DB::table('finish_directions')->truncate();
        FinishDirection::create([
            'name' => "فوق",
        ]);
        FinishDirection::create([
            'name' => "تحت",
        ]);
        FinishDirection::create([
            'name' => "يمين",
        ]);
        FinishDirection::create([
            'name' => "شمال",
        ]);


        DB::table('covers')->truncate();
        Cover::create([
            'name' => "لامع وجه",
            'width' => "100",
            'height' => "70",
            'price' => "1.6",
        ]);
        Cover::create([
            'name' => "لامع وجهين",
            'width' => "100",
            'height' => "70",
            'price' => "1.20",
        ]);
        Cover::create([
            'name' => "مط وجه",
            'width' => "100",
            'height' => "70",
            'price' => "1.6",
        ]);
        Cover::create([
            'name' => "مط وجهين",
            'width' => "100",
            'height' => "70",
            'price' => "1.20",
        ]);


        DB::table('fold_pockets')->truncate();
        FoldPocket::create([
            'name' => "جيب فقط-لزق",
        ]);
        FoldPocket::create([
            'name' => "جيب و شباك-لزق",
        ]);
        FoldPocket::create([
            'name' => "جيب قفل ذاتي",
        ]);
        FoldPocket::create([
            'name' => "جيب و شباك قفل ذاتي",
        ]);


        DB::table('fold_numbers')->truncate();
        FoldNumber::create([
            'name' => "ريجة",
            'price' => "25",
        ]);



        DB::table('cut_styles')->truncate();
        CutStyle::create([
            'name' => "عادي",
        ]);
        CutStyle::create([
            'name' => "كيرفي",
        ]);

        DB::table('glues')->truncate();
        Glue::create([
            'name' => "لزق الجيب منه فيه",
            'price' => "0.15",
        ]);
        Glue::create([
            'name' => "لزق جيب خارجي",
            'price' => "45",
        ]);
        // $this->call("OthersTableSeeder");
    }
}
