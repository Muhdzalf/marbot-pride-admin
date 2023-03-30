<?php

namespace Database\Seeders;

use App\Models\DonationMethod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonationMethod::create(
            [
                'name' => 'Bank Transfer',
                'description' => 'Transfer dari berbagai bank'
            ],
        );

        DonationMethod::create(
            [
                'name' => 'Qris',
                'description' => 'Transfer dari qris'
            ],
        );
    }
}
