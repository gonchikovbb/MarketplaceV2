<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $products = ['Квадракоптер','Стабилизатор','VR-очки','Ирригатор','Увлажнитель воздуха','Диктофон','Толщиномер','Термометр', 'Часы', 'Наушники'];

        foreach (range(0, 9) as $index)  {

            DB::table('products')->insert([
                'name' => $products[$index],
                'price' => $faker->numberBetween($min = 100, $max = 5000),
                'stock' => $faker->numberBetween($min = 0, $max = 10),
            ]);
        }
    }
}
