<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'isbn' => '978-4-8222-5399-8',
            'title' => 'Visual C# 2019 超入門',
            'price' => '2000',
            'publisher' => '日経BP',
            'published' => '2019-08-22'
        ]);
    }
}
