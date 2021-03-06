<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert(
            [
                'name' => 'Beasiswa Pendidikan Muslim United',
                'description' => 'Beasiswa muslim united diperuntukan bagi siapa saja yang sedang atau ingin mengenyam pendidikan di semua jenjang pendidikan',
                'target_donation' => 50000000,
                'admin_id' => 1
            ]
        );
    }
}
