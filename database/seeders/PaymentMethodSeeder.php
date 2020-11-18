<?php

namespace Database\Seeders;

use App\Models\PaymentMethods;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethods::factory()
            ->state(new Sequence(
                ['name' => 'cash'],
                ['name' => 'card'],
                ['name' => 'non-cash']
            ))
        ->count(3)->create();
    }

}
