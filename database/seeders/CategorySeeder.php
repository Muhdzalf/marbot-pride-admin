<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                'name' => 'Shalat',
                'description' => 'kajian mengenai shalat'
            ],
        );
        DB::table('categories')->insert(
            [
                'name' => 'Sejarah',
                'description' => 'kajian mengenai sejarah'
            ],
        );
        DB::table('categories')->insert(
            [
                'name' => 'Taqwa',
                'description' => 'kajian mengenai taqwa'
            ],
        );
    }
}
