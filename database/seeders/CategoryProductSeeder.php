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
            'category_id' => 2,
            'product_id' => 1,

        ]);
        Category_Product::create([
            'category_id' => 1,
            'product_id' => 1,

        ]);
        Category_Product::create([
            'category_id' => 2,
            'product_id' => 2,

        ]);

        Category_Product::create([
            'category_id' => 2,
            'product_id' => 3,

        ]);
        Category_Product::create([
            'category_id' => 1,
            'product_id' => 4,

        ]);
        Category_Product::create([
            'category_id' => 1,
            'product_id' => 5,

        ]);
        Category_Product::create([
            'category_id' => 1,
            'product_id' => 6,

        ]);
        Category_Product::create([
            'category_id' => 3,
            'product_id' => 7,

        ]);
        Category_Product::create([
            'category_id' => 3,
            'product_id' => 8,

        ]);
        Category_Product::create([
            'category_id' => 3,
            'product_id' => 9,

        ]);
        Category_Product::create([
            'category_id' => 1,
            'product_id' => 7,

        ]);
    }
}
