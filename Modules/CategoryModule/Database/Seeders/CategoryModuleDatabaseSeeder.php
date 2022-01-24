<?php

namespace Modules\CategoryModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\CategoryModule\Entities\Category;

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
        // $this->call("OthersTableSeeder");
    }
}
