<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kajian_videos')->insert(
            [
                'title' => 'Nabi Ibrahim AS',
                'description' => 'Kajian teladan Nabi Ibrahim AS',
                'video_url' => 'youtube.com',
                'admin_id' => 1,
                'ustadz_id' => 1
            ]
        );
    }
}
