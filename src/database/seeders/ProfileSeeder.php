<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = array('Admin', 'Author', 'Subscriber', 'Support');

        foreach ($profiles as $profile) {
            DB::table('profiles')->insert([
                'name' => $profile,
                'description' => str_shuffle('abcdefghi')
            ]);
        }
    }
}
