<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array('Tech', 'Science', 'Daily', 'Math', 'Food', 'Health');

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'type' => $category,
                'observation' => $this->faker->sentence($nbWords = 6, $variableNbWords = true)
            ]);
        }
    }
}
