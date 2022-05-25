<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Samsung Galaxy',
                'description' => 'Samsung Brand',
                'image' => '1653462509.jpeg',
                'price' => 100,
                'quantity' => 5
            ],
            [
                'name' => 'Apple iPhone 12',
                'description' => 'Apple Brand',
                'image' => '1653464298.jpeg',
                'price' => 500,
                'quantity' => 12
            ],
            [
                'name' => 'Google Pixel 2 XL',
                'description' => 'Google Pixel Brand',
                'image' => '1653464260.jpeg',
                'price' => 400,
                'quantity' => 15
            ],
            [
                'name' => 'LG V10 H800',
                'description' => 'LG Brand',
                'image' => '1653462537.jpeg',
                'price' => 200,
                'quantity' => 10
            ]
        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
