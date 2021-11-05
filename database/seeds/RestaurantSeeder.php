<?php

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++){
            $restaurant = new Restaurant();
            $restaurant->name = $faker->name();
            $restaurant->email = $faker->email();
            $restaurant->password = bcrypt($faker->password());
            $restaurant->address = $faker->address();
            $restaurant->iva = $faker->isbn10();
            $restaurant->avatar = $faker->imageUrl(640, 480, 'animals', true);
            $restaurant->delivery_fee = $faker->randomFloat(2, 1, 10);
            $restaurant->vote=$faker->numberBetween(0, 5);
            $restaurant->description=$faker->text(100);
            $restaurant->open=$faker->boolean();
            $restaurant->opening_time=$faker->time();
            $restaurant->closing_time=$faker->time();
            $restaurant->save();
        }
    }
}
