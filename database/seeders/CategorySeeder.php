<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'category_name' => 'Cliente',
            ],
            [
                'category_name' => 'Proveedor',
            ],
            [
                'category_name' => 'Funcionario Interno',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
