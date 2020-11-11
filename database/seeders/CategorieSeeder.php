<?php

namespace Database\Seeders;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::factory()->has(Product::factory()->count(2))->count(2)->create();
    }
}
