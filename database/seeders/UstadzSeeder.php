<?php

namespace Database\Seeders;

use App\Models\Ustadz;
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
        Ustadz::create(
            [
                'name' => 'Ustadz Adi Hidayat',
                'description' => 'Ustadz Adi hidayat adalah ustadz yang berasal dari jawa barat',
                'poster_url' => 'https://example.com'

            ]
        );
        Ustadz::create(
            [
                'name' => 'Ustadz Felix Siaw',
                'description' => 'Ustadz Felix adalah ustadz keturunan thionghoa',
                'poster_url' => 'https://example.com'

            ]
        );
    }
}
