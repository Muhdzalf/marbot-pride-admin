<?php

namespace Database\Seeders;

use App\Models\Kajian;
use App\Models\Tema;
use Illuminate\Database\Seeder;

class KajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kajian::create([
            'title' => 'Perjalanan Hijrah Nabi Muhammad SAW',
            'description' => 'kajian mengenai perjalanan hijrah nabi muhammad SAW menuju madinah',
            'benefit' => 'benefit yang didapat dari kajian ini ...',
            'poster_url' => 'https://example.com',
            'video_url' => 'https://example.com',
            'tag' => '',
            'tema_id' => '1',
            'ustadz_id' => '1',
        ]);
    }
}
