<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'user_id' => 1, 
            'title' => 'Category A',
        ]);

        Category::create([
            'user_id' => 1,
            'title' => 'Category B',
        ]);

        Category::create([
            'user_id' => 1,
            'title' => 'Category C',
        ]);
    }
}
