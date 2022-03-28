<?php

namespace Modules\MaterialModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\MaterialModule\Entities\Color;
use Modules\MaterialModule\Entities\Constant;
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
use Modules\MaterialModule\Entities\PaperTypePaperSize;
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
                // *************************************************constants***********************************************************

                DB::table('constants')->truncate();
                Constant::create([
                    'name' => "زنكات",
                    'price' => "40"
                ]);
                Constant::create([
                    'name' => "تراج",
                    'price' => "40"
                ]);
                Constant::create([
                    'name' => "سولفان",
                    'price' => "1.60"
                ]);
               
        // *************************************************colors***********************************************************

        DB::table('colors')->truncate();
        Color::create([
            'name' => "1 لون",
            'price' => "30"
        ]);
        Color::create([
            'name' => "2 لون",
            'price' => "60"
        ]);
        Color::create([
            'name' => "3 لون",
            'price' => "90"
        ]);
        Color::create([
            'name' => "4 لون",
            'price' => "120"
        ]);

        // *************************************************print options***********************************************************

        DB::table('print_options')->truncate();
        PrintOption::create([
            'name' => "وجه فقط",
        ]);
        PrintOption::create([
            'name' => "وجه و ضهر",
        ]);

        // *************************************************paper size***********************************************************

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
            'quantity_in_standard' => '2',
        ]);
        PaperSize::create([
            'name' => "ربع الفرخ",
            'width' => '33.5',
            'height' => '48.5',
            'quantity_in_standard' => '4',
            'quantity_in_quarter' => '1'
        ]);
        PaperSize::create([
            'name' => "ثمن الفرخ",
            'width' => '24.25',
            'height' => '33.5',
            'quantity_in_standard' => '8',
            'quantity_in_quarter' => '2'
        ]);
        PaperSize::create([
            'name' => "نص ثمن الفرخ",
            'width' => '16.75',
            'height' => '24.25',
            'quantity_in_standard' => '16',
            'quantity_in_quarter' => '4'
        ]);
        PaperSize::create([
            'name' => "ربع ثمن الفرخ",
            'width' => '12.12',
            'height' => '16.75',
            'quantity_in_standard' => '32',
            'quantity_in_quarter' => '8'
        ]);
        PaperSize::create([
            'name' => "خمس الفرخ",
            'width' => '28.5',
            'height' => '38.5',
            'quantity_in_standard' => '5',
            'quantity_in_quarter' => '1'
        ]);
        PaperSize::create([
            'name' => "نص خمس الفرخ",
            'width' => '19.25',
            'height' => '28.5',
            'quantity_in_standard' => '10',
            'quantity_in_quarter' => '2'
        ]);
        PaperSize::create([
            'name' => "ربع خمس الفرخ",
            'width' => '14.25',
            'height' => '19.25',
            'quantity_in_standard' => '20',
            'quantity_in_quarter' => '4'
        ]);
        PaperSize::create([
            'name' => "سدس الفرخ",
            'width' => '21.5',
            'height' => '48.5',
            'quantity_in_standard' => '6',
            'quantity_in_quarter' => '1'
        ]);
        PaperSize::create([
            'name' => "نص سدس الفرخ-عرض",
            'width' => '21.5',
            'height' => '24.25',
            'quantity_in_standard' => '12',
            'quantity_in_quarter' => '2'
        ]);
        PaperSize::create([
            'name' => "ربع سدس الفرخ-طول",
            'width' => '12.25',
            'height' => '21.5',
            'quantity_in_standard' => '24',
            'quantity_in_quarter' => '4'
        ]);
        PaperSize::create([
            'name' => "11 حته",
            'width' => '18.5',
            'height' => '28.5',
            'quantity_in_standard' => '11',
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
            'name' => "A3",
            'width' => '29.7',
            'height' => '42',
            'quantity_in_standard' => '4',
            'quantity_in_quarter' => '1'
        ]);
        PaperSize::create([
            'name' => "A4",
            'width' => '21',
            'height' => '29.7',
            'quantity_in_standard' => '8',
            'quantity_in_quarter' => '2'
        ]);
        PaperSize::create([
            'name' => "A5",
            'width' => '15',
            'height' => '21',
            'quantity_in_standard' => '16',
            'quantity_in_quarter' => '4'
        ]);
        PaperSize::create([
            'name' => "A6",
            'width' => '10.5',
            'height' => '15',
            'quantity_in_standard' => '32',
            'quantity_in_quarter' => '8'
        ]);
        PaperSize::create([
            'name' => "ربع الجاير الطبع",
            'width' => '29.7',
            'height' => '42',
            'quantity_in_standard' => '4',
            'quantity_in_quarter' => '1'
        ]);
        PaperSize::create([
            'name' => "ربع الجاير الكوشيه",
            'width' => '31.5',
            'height' => '42.5',
            'quantity_in_standard' => '4',
            'quantity_in_quarter' => '1'
        ]);
        PaperSize::create([
            'name' => "B3",
            'width' => '48.5',
            'height' => '33.5',
            'quantity_in_standard' => '4',
            'quantity_in_quarter' => '1'
        ]);
        PaperSize::create([
            'name' => "B4",
            'width' => '24.25',
            'height' => '33.5',
            'quantity_in_standard' => '8',
            'quantity_in_quarter' => '2'
        ]);
        PaperSize::create([
            'name' => "B5",
            'width' => '16.75',
            'height' => '24.25',
            'quantity_in_standard' => '16',
            'quantity_in_quarter' => '4'
        ]);
        PaperSize::create([
            'name' => "B6",
            'width' => '12',
            'height' => '16.75',
            'quantity_in_standard' => '32',
            'quantity_in_quarter' => '8'
        ]);
        PaperSize::create([
            'name' => "DL",
            'width' => '11',
            'height' => '22',
        ]);
        PaperSize::create([
            'name' => "C3",
            'width' => '45.7',
            'height' => '32.4',
        ]);
        PaperSize::create([
            'name' => "C4",
            'width' => '32.4',
            'height' => '22.9',
        ]);
        PaperSize::create([
            'name' => "C5",
            'width' => '16.2',
            'height' => '22.9',
        ]);
        PaperSize::create([
            'name' => "فرخ جاير طبع",
            'width' => '84',
            'height' => '60',
        ]);
        PaperSize::create([
            'name' => "فرخ جاير كوشيه",
            'width' => '88',
            'height' => '66',
        ]);
        PaperSize::create([
            'name' => "سدس الفرخ -المربع",
            'width' => '31.5',
            'height' => '33.5',
            'quantity_in_standard' => '6',
            'quantity_in_quarter' => '1'
        ]);
        PaperSize::create([
            'name' => "نص سدس الفرخ -المربع",
            'width' => '16.75',
            'height' => '31.5',
            'quantity_in_standard' => '12',
            'quantity_in_quarter' => '2'
        ]);
        PaperSize::create([
            'name' => "ربع سدس الفرخ -المربع",
            'width' => '16.75',
            'height' => '15.75',
            'quantity_in_standard' => '24',
            'quantity_in_quarter' => '4'
        ]);
        PaperSize::create([
            'name' => "طبع جاير A4",            'width' => '21',
            'height' => '29.7',
            'quantity_in_standard' => '8',
            'quantity_in_quarter' => '2'
        ]);
        // *************************************************paper type***********************************************************

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
        PaperType::create([
            'name' => "مظروف A3",
            'width' => '32.4',
            'height' => '45.7',
            'price' => '1.60',
        ]);
        PaperType::create([
            'name' => "مظروف A4 لزق ذاتي",
            'width' => '22.9',
            'height' => '32.4',
            'price' => '0.84',
        ]);
        PaperType::create([
            'name' => "مظروف A5",
            'width' => '16.2',
            'height' => '22.9',
            'price' => '0.22',
        ]);
        // *************************************************paper size->paper type***********************************************************

        DB::table('paper_size_paper_type')->truncate();
        // flyer => A4
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "17",
            'paper_type_id' => "53",
        ]);

        // flyer => A5
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "18",
            'paper_type_id' => "53",
        ]);

        // flyer => A6
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "19",
            'paper_type_id' => "53",
        ]);

        // flyer => B4
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "5",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "6",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "7",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "8",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "23",
            'paper_type_id' => "59",
        ]);

        // flyer => B5
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "5",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "6",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "7",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "8",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "24",
            'paper_type_id' => "59",
        ]);

        // flyer => B6
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "25",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "7",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "25",
        //     'paper_type_id' => "8",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "25",
            'paper_type_id' => "59",
        ]);

        // flyer => 0.25 1/5
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "9",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "9",
            'paper_type_id' => "59",
        ]);

        // flyer => 0.5 1/5
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "3",
        //     'paper_size_id' => "8",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "3",
            'paper_size_id' => "8",
            'paper_type_id' => "59",
        ]);

        // block note => A4
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "17",
            'paper_type_id' => "53",
        ]);

        // block note => A5
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "18",
            'paper_type_id' => "53",
        ]);

        // block note => A6
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "19",
            'paper_type_id' => "53",
        ]);

        // block note => B4
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "6",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "23",
            'paper_type_id' => "59",
        ]);

        // block note => B5
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "6",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "24",
            'paper_type_id' => "59",
        ]);

        // block note => B6
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "6",
        //     'paper_size_id' => "25",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "25",
            'paper_type_id' => "59",
        ]);

        // block note => 0.25 1/5
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "6",
        //     'paper_size_id' => "9",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "9",
            'paper_type_id' => "59",
        ]);

        // block note => 0.5 1/5
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "6",
        //     'paper_size_id' => "8",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "6",
            'paper_size_id' => "8",
            'paper_type_id' => "59",
        ]);

        // 'دفاتر => A4
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "53",
        ]);

        // 'دفاتر => A5
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "53",
        ]);

        // 'دفاتر => A6
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "53",
        ]);

        // 'دفاتر => B4
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "14",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "59",
        ]);

        // 'دفاتر => B5
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "14",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "59",
        ]);

        // 'دفاتر => B6
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "14",
        //     'paper_size_id' => "25",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "59",
        ]);

        // 'دفاتر => 0.25 1/5
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "14",
        //     'paper_size_id' => "9",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "59",
        ]);

        // 'دفاتر => 0.5 1/5
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "14",
        //     'paper_size_id' => "8",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "59",
        ]);

        // prescription => A4
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "17",
            'paper_type_id' => "53",
        ]);

        // prescription => A5
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "18",
            'paper_type_id' => "53",
        ]);

        // prescription => A6
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "19",
            'paper_type_id' => "53",
        ]);

        // prescription => B4
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "13",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "23",
            'paper_type_id' => "59",
        ]);

        // prescription => B5
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "13",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "24",
            'paper_type_id' => "59",
        ]);

        // prescription => B6
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "13",
        //     'paper_size_id' => "25",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "25",
            'paper_type_id' => "59",
        ]);

        // prescription => 0.25 1/5
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "13",
        //     'paper_size_id' => "9",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "9",
            'paper_type_id' => "59",
        ]);

        // prescription => 0.5 1/5
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "13",
        //     'paper_size_id' => "8",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "13",
            'paper_size_id' => "8",
            'paper_type_id' => "59",
        ]);

        // 'دفاتر => A4
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "17",
            'paper_type_id' => "53",
        ]);

        // 'دفاتر => A5
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "18",
            'paper_type_id' => "53",
        ]);

        // 'دفاتر => A6
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "19",
            'paper_type_id' => "53",
        ]);

        // 'دفاتر => B4
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "14",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "23",
            'paper_type_id' => "59",
        ]);

        // 'دفاتر => B5
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "14",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "24",
            'paper_type_id' => "59",
        ]);

        // 'دفاتر => B6
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "14",
        //     'paper_size_id' => "25",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "25",
            'paper_type_id' => "59",
        ]);

        // 'دفاتر => 0.25 1/5
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "14",
        //     'paper_size_id' => "9",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "9",
            'paper_type_id' => "59",
        ]);

        // 'دفاتر => 0.5 1/5
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "14",
        //     'paper_size_id' => "8",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "14",
            'paper_size_id' => "8",
            'paper_type_id' => "59",
        ]);

        // book => A4
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "17",
            'paper_type_id' => "53",
        ]);

        // book => A5
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "18",
            'paper_type_id' => "53",
        ]);

        // book => A6
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "19",
            'paper_type_id' => "53",
        ]);

        // book => B4
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "5",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "23",
            'paper_type_id' => "59",
        ]);

        // book => B5
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "5",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "24",
            'paper_type_id' => "59",
        ]);

        // book => B6
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "5",
        //     'paper_size_id' => "25",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "5",
            'paper_size_id' => "25",
            'paper_type_id' => "59",
        ]);


        // magazine => A4
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "17",
            'paper_type_id' => "53",
        ]);

        // magazine => B4
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "4",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "23",
            'paper_type_id' => "59",
        ]);

        // magazine => B5
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "4",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "24",
            'paper_type_id' => "59",
        ]);

        // magazine => B3
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "4",
        //     'paper_size_id' => "22",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "22",
            'paper_type_id' => "59",
        ]);

        // magazine => 0.25 1/5
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "4",
        //     'paper_size_id' => "9",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "9",
            'paper_type_id' => "59",
        ]);

        // magazine => 0.5 1/5
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "4",
        //     'paper_size_id' => "8",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "8",
            'paper_type_id' => "59",
        ]);

        // magazine => 1/6
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "4",
        //     'paper_size_id' => "32",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "4",
            'paper_size_id' => "32",
            'paper_type_id' => "59",
        ]);

        // brochure => A4
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "17",
            'paper_type_id' => "53",
        ]);

        // brochure => A5
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "18",
            'paper_type_id' => "53",
        ]);

        // brochure => A6
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "19",
            'paper_type_id' => "53",
        ]);

        // brochure => B4
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "5",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "6",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "7",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "23",
        //     'paper_type_id' => "8",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "23",
            'paper_type_id' => "59",
        ]);

        // brochure => B5
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "5",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "6",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "7",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "24",
        //     'paper_type_id' => "8",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "24",
            'paper_type_id' => "59",
        ]);

        // brochure => B6
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "25",
        //     'paper_type_id' => "5",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "25",
        //     'paper_type_id' => "6",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "25",
        //     'paper_type_id' => "7",
        // ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "25",
        //     'paper_type_id' => "8",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "25",
            'paper_type_id' => "59",
        ]);

        // brochure => 0.25 1/5
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "9",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "9",
            'paper_type_id' => "59",
        ]);

        // brochure => 0.5 1/5
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "8",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "8",
            'paper_type_id' => "59",
        ]);

        // brochure => 1/5
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "9",
        ]);
        // PaperTypePaperSize::create([
        //     'category_id' => "2",
        //     'paper_size_id' => "7",
        //     'paper_type_id' => "5",
        // ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "6",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "7",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "8",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "14",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "15",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "16",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "2",
            'paper_size_id' => "7",
            'paper_type_id' => "59",
        ]);


        // sticker => A3
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "16",
            'paper_type_id' => "69",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "16",
            'paper_type_id' => "68",
        ]);

        // sticker => A4
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "17",
            'paper_type_id' => "69",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "17",
            'paper_type_id' => "68",
        ]);

        // sticker => A5
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "18",
            'paper_type_id' => "69",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "18",
            'paper_type_id' => "68",
        ]);

        // sticker => A6
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "19",
            'paper_type_id' => "68",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "19",
            'paper_type_id' => "69",
        ]);

        // sticker => B3
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "22",
            'paper_type_id' => "68",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "22",
            'paper_type_id' => "69",
        ]);

        // sticker => B4
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "23",
            'paper_type_id' => "68",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "23",
            'paper_type_id' => "69",
        ]);

        // sticker => B5
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "24",
            'paper_type_id' => "68",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "24",
            'paper_type_id' => "69",
        ]);
        // sticker => B6
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "25",
            'paper_type_id' => "68",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "25",
            'paper_type_id' => "69",
        ]);

        // sticker => 0.25 1/5
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "9",
            'paper_type_id' => "68",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "9",
            'paper_type_id' => "69",
        ]);

        // sticker => 0.5 1/5
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "8",
            'paper_type_id' => "68",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "8",
            'paper_type_id' => "69",
        ]);

        // sticker => 1/6
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "10",
            'paper_type_id' => "68",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "10",
            'paper_type_id' => "69",
        ]);

        // sticker => 1/6 (31.5*33.5)
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "32",
            'paper_type_id' => "68",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "10",
            'paper_size_id' => "32",
            'paper_type_id' => "69",
        ]);

        // envelop(dl)
        PaperTypePaperSize::create([
            'category_id' => "9",
            'paper_size_id' => "26",
            'paper_type_id' => "72",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "9",
            'paper_size_id' => "26",
            'paper_type_id' => "73",
        ]);
          // envelop(c3)
        PaperTypePaperSize::create([
            'category_id' => "9",
            'paper_size_id' => "27",
            'paper_type_id' => "78",
        ]);
           // envelop(c4)
        PaperTypePaperSize::create([
            'category_id' => "9",
            'paper_size_id' => "28",
            'paper_type_id' => "79",
        ]);
           // envelop(c5)
        PaperTypePaperSize::create([
            'category_id' => "9",
            'paper_size_id' => "29",
            'paper_type_id' => "80",
        ]);

        // small folder => A4
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "17",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "17",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "17",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "17",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "17",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "17",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "17",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "17",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "17",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "17",
            'paper_type_id' => "53",
        ]);

        // small folder => A5
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "18",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "18",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "18",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "18",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "18",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "18",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "18",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "18",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "18",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "18",
            'paper_type_id' => "53",
        ]);

        // small folder => B4
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "59",
        ]);

        // small folder => B5
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "23",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "11",
            'paper_size_id' => "24",
            'paper_type_id' => "59",
        ]);

        // large folder => B3
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "22",
            'paper_type_id' => "59",
        ]);
        // large folder => 1/5
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "23",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "24",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "25",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "30",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "31",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "32",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "35",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "41",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "42",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "43",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "50",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "51",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "52",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "55",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "56",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "57",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "58",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "7",
            'paper_type_id' => "59",
        ]);

        // large folder => A3
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "16",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "16",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "16",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "16",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "16",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "16",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "16",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "16",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "16",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "12",
            'paper_size_id' => "16",
            'paper_type_id' => "53",
        ]);

        // letter head => A4
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "67",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "2",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "9",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "4",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "5",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "12",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "13",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "20",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "21",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "22",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "28",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "29",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "39",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "46",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "47",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "48",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "17",
            'paper_type_id' => "53",
        ]);

        // letter head => A4 جاير
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "35",
            'paper_type_id' => "61",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "35",
            'paper_type_id' => "63",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "35",
            'paper_type_id' => "66",
        ]);
        PaperTypePaperSize::create([
            'category_id' => "7",
            'paper_size_id' => "35",
            'paper_type_id' => "1",
        ]);
        // *************************************************finish options***********************************************************

        DB::table('finish_options')->truncate();
        FinishOption::create([
            'name' => "غراء=لزق",
        ]);
        FinishOption::create([
            'name' => "دبوس",
        ]);
        FinishOption::create([
            'name' => "سلك",
        ]);
        FinishOption::create([
            'name' => "ملازم",
        ]);
        // *************************************************finish direction***********************************************************

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

        // *************************************************cover***********************************************************

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
        // *************************************************fold pockets***********************************************************

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

        // *************************************************fold number***********************************************************

        DB::table('fold_numbers')->truncate();
        FoldNumber::create([
            'name' => "ريجة",
            'price' => "25",
        ]);


        // *************************************************cut style***********************************************************

        DB::table('cut_styles')->truncate();
        CutStyle::create([
            'name' => "عادي",
        ]);
        CutStyle::create([
            'name' => "كيرف",
        ]);
        // *************************************************glue***********************************************************

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
