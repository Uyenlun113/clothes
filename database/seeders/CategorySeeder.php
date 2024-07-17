<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = Faker::create();
        $cateSeen = [];
       
         for($i=0;$i<5;$i++){
            $cateSeen[] = [
                'name' => $faker->name(), 
                'description' => $faker->text(), 
                'status' => $faker->numberBetween(0, 1),
             ];
         }
         DB::table('categories')->insert($cateSeen);
        //
    }
}