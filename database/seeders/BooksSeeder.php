<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y/m/d H:i:s');
        $booksData = [
            [
                'book_name' => 'PHP Programming',
                'author_id' => 1,
                'published_at' => $date
            ],
            [
                'book_name' => 'Math Essentials',
                'author_id' => 2,
                'published_at' => $date
            ],
            [
                'book_name' => 'German Base',
                'author_id' => 3,
                'published_at' => $date
            ],
            [
                'book_name' => 'English Pro',
                'author_id' => 4,
                'published_at' => $date
            ],
        ];

        foreach($booksData as $value){
            Books::create($value);
        }

    }
}
