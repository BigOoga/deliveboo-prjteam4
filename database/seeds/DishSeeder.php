<?php

use Illuminate\Database\Seeder;
use App\Models\Dish;
use Faker\Generator as Faker;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $restaurantsIDs = DB::table('restaurants')->pluck('id');

        for ($i = 0; $i < 15; $i++) {

            $dish = new Dish();
            $dish->restaurant_id = $faker->randomElement($restaurantsIDs);
            $dish->name = $faker->name();
            $dish->description = $faker->text(150);
            $dish->price = $faker->randomFloat(2, 1, 10);
            $dish->entry = $faker->text(50);
            $dish->picture = $faker->imageUrl(640, 480, 'animals', true);
            $dish->vegan = $faker->boolean();
            $dish->vegetarian = $faker->boolean();
            $dish->frozen = $faker->boolean();
            $dish->gluten_free = $faker->boolean();
            $dish->available = $faker->boolean();
            $dish->save();
        }
    }
}
