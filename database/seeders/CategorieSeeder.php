<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        Categorie::factory()
            ->has(Product::factory()->
            state(new Sequence(
                ['brand_id' => 1],
                ['brand_id' => 2],
                ['brand_id' => 3],
                ['brand_id' => 4]
                            ))->count(15))
            ->state(new Sequence(
                ['parent_id' => '1'],
                ['parent_id' => '2'],
                ['parent_id' => '3']
            ))->count(10)->create();


    }
}
