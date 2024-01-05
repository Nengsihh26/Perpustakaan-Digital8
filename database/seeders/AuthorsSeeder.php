<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Authors;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Authors::create([
            'author_name' => 'Alex Tarnar',
            'author_id' => 1, // Sesuaikan dengan nilai ID yang sesuai
        ]);

        Authors::create([
            'author_name' => 'Tom Krone',
            'author_id' => 2, // Sesuaikan dengan nilai ID yang sesuai
        ]);

        Authors::create([
            'author_name' => 'Matheus',
            'author_id' => 3, // Sesuaikan dengan nilai ID yang sesuai
        ]);

        Authors::create([
            'author_name' => 'Harry',
            'author_id' => 4, // Sesuaikan dengan nilai ID yang sesuai
        ]);
    }
}
