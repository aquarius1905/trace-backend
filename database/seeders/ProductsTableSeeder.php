<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $products = [
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
            [
                'name' => 'sandal',
                'price' => 3000,
                'img_filename' => 'beigesandal.jpg'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
