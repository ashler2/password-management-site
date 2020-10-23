<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create(['screen_name' => 'Dev', 'name'    =>  'dev']);
        Category::create(['screen_name' => 'Social', 'name' =>  'social']);
        Category::create(['screen_name' => 'Other', 'name'  =>  'other']);
    }
}
