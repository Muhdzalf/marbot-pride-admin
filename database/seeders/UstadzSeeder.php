<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UstadzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ustadzs')->insert(
            [
                'name' => 'Ustadz Adi Hidayat',
                'description' => 'Ustadz asli jawa barat'
            ]
        );
    }
}
