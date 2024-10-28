<?php

namespace Database\Seeders;

use App\Models\Category_Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category_Product::create([
            'category_id' => 1,
            'product_id' => 1,

        ]);
        Category_Product::create([
            'category_id' => 1,
            'product_id' => 2,

        ]);

        Category_Product::create([
            'category_id' => 2,
            'product_id' => 2,

        ]);
        Category_Product::create([
            'category_id' => 2,
            'product_id' => 3,

        ]);
    }
}
