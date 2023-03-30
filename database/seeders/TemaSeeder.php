<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Seeder;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tema::create(
            [
                'title' => 'Sejarah Nabi',
                'description' => 'Kumpulan kajian mengenai sejarah-sejarah para Nabi',
                'poster_url' => 'https://google.com',
                'tag' => null,
            ]
        );
    }
}
