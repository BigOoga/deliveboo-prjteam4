<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newOrder = new Order();
            $newOrder->status = $faker->numberBetween(0, 5);
            $newOrder->address = $faker->address();
            $newOrder->user_name = $faker->firstName();
            $newOrder->user_surname = $faker->lastName();
            $newOrder->phone = $faker->numerify('###-###-####');
            $newOrder->email = $faker->email();
            $newOrder->total = $faker->randomFloat(2, 6, 100);
            $newOrder->save();
        }
    }
}
