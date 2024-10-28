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
        Product::create(['title' => 'H&M Classic White Button-Up Shirt','description'=>' The H&M Classic White Button-Up Shirt is a wardrobe essential perfect for any occasion. ','price'=>'50','amount'=>'30','path'=>'products-image/download (1).jpeg']);
        Product::create(['title' => ' Gap Relaxed Fit Denim Jacket','description'=>'The Gap Relaxed Fit Denim Jacket is a timeless layering piece that never goes out of style.','price'=>'50','amount'=>'30','path'=>'products-image/download (2).jpeg']);
        Product::create(['title' => 'Aerie Boyfriend Sweatshirt','description'=>'The Aerie Boyfriend Sweatshirt is the epitome of comfort and style, made from soft, cozy fabric','price'=>'50','amount'=>'30']);

        Product::create(['title' => 'LG OLED Smart TV','description'=>' Experience cinematic brilliance with the LG OLED Smart TV, featuring self-lighting OLED technology for deep blacks,','price'=>'500','amount'=>'100']);
        Product::create(['title' => 'JBL Flip 6 Bluetooth Speaker','description'=>'The JBL Flip 6 delivers powerful sound in a portable design. With an IP67 rating for water and dust resistance','price'=>'760','amount'=>'20']);
        Product::create(['title' => 'Apple iPhone 14','description'=>'The Apple iPhone 14 features a stunning 6.1-inch Super Retina XDR display, A15 Bionic chip for lightning-fast performance','price'=>'890','amount'=>'40']);

        Product::create(['title' => ' Garden Trellis for Climbing Plants','description'=>' Enhance your garden’s visual appeal with a Garden Trellis designed for climbing plants.','price'=>'5880','amount'=>'10']);
        Product::create(['title' => '. The Ames 30-Inch Garden Hoe','description'=>' The Ames 30-Inch Garden Hoe is a versatile tool designed for easy digging and weeding in your garden. ','price'=>'520','amount'=>'35']);
        Product::create(['title' => ' Gardena Smart Watering System','description'=>'The Gardena Smart Watering System offers an efficient way to keep your garden lush and healthy.','price'=>'770','amount'=>'30']);


    }
}
