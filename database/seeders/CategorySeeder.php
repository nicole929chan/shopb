<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $categories = Category::factory(2)->create();
        $category = $categories->first();
        $subcategories = Category::factory(3)->create(['parent_id' => $category->id]);

        $subcategory = $subcategories[1];
        Category::factory(5)->create(['parent_id' => $subcategory->id]);
    }
}
