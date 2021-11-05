<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Asiatico',
            'Americano',
            'Fast Food',
            'Gastronomia',
            'Italiano',
            'Kebab',
            'Pizza',
            'Pesce',
            'Sushi',
            'Internazionale',
            'Vegano',
            'Vegetariano',
            'Greco',
            'Siciliano',
            'Egiziano',
            'Colazione',
            'Snack',
            'Birra'
        ];

        foreach ($types as $type) {

            $newType = new Type();

            $newType->name = $type;

            $newType->save();
        }
    }
}
