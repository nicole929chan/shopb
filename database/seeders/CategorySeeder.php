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

        $coffee = Category::factory()->create(['title' => '咖啡']);
        $cake = Category::factory()->create(['title' => '蛋糕']);
        $handmade = Category::factory()->create([
            'parent_id' => $coffee->id,
            'title' => '手沖咖啡',
        ]);
        $syphon = Category::factory()->create([
            'parent_id' => $coffee->id,
            'title' => '虹吸式咖啡',
        ]);
        Category::factory()->create([
            'parent_id' => $handmade->id,
            'title' => '淺焙',
        ]);
        Category::factory()->create([
            'parent_id' => $handmade->id,
            'title' => '深焙',
        ]);
    }
}
