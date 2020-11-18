<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::random(10),
            'sku' => $this->faker->company,
            'brand_id' => Brand::factory(),
            'price' => random_int(100, 10000),
            'in_stock' => random_int(1, 10),
            'description' => $this->faker->text,

        ];
    }
}
