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
        for ($i = 0; $i < 10; $i++) {
            $restaurant = new Restaurant();
            $restaurant->name = $faker->name();
            $restaurant->email = $faker->email();
            $restaurant->password = bcrypt('password');
            $restaurant->address = $faker->address();
            $restaurant->iva = $faker->isbn10();
            $restaurant->image = $faker->imageUrl(640, 480, 'animals', true);
            $restaurant->delivery_fee = $faker->randomFloat(2, 1, 10);
            $restaurant->votes = $faker->numberBetween(0, 5);
            $restaurant->description = $faker->text(100);
            $restaurant->is_open = $faker->boolean();
            $restaurant->opening_time = $faker->time();
            $restaurant->closing_time = $faker->time();
            $restaurant->save();

            // Numero dei tipi disponibili hardcodato
            $total_types = 18;

            // Randomizzo quanti ruoli attachare tra 1 e 10 (arbitrariamente)
            $randomTypesNum = rand(1, 10);

            $randomTypeIds = [];
            for ($j = 0; $j < $randomTypesNum; $j++) {
                $randomTypeId = rand(1, $total_types);
                $randomTypeIds[] = $randomTypeId;
            };

            $restaurant->types()->attach($randomTypeIds);
        }
    }
}
