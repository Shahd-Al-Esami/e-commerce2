<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['title' => 'title1','description'=>'desc1','price'=>'50','amount'=>'5']);
        Product::create(['title' => 'title2','description'=>'desc2','price'=>'70','amount'=>'15']);
        Product::create(['title' => 'title3','description'=>'desc3','price'=>'80','amount'=>'20']);

    }
}
