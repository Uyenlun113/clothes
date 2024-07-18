<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sub = [];
          //khởi tạo mảng mới và lấy toàn bộ danh sách khóa ngoại categories
        $categoryID = DB::table('categories')->pluck('id')->toArray();
        for ($i = 1; $i <= 10; $i++) {
            $sub[] = [
                'name' => fake()->name(),
                'description' => fake()->text(),
                'keywords' => fake()->text(),
                'url' => fake()-> text(),
                'category_id' => fake()->randomElement($categoryID),
                'status' => fake()->numberBetween(0,1),
               
            ];
        }

        DB::table('subcategories')->insert($sub);
        //
    }
}