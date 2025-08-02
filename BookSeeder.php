<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create(['title' => 'Laravel Magic', 'author' => 'Faiza Khan', 'year' => 2022]);
        Book::create(['title' => 'API for Beginners', 'author' => 'Ali Ahmed', 'year' => 2023]);
        Book::create(['title' => 'RESTful Tricks', 'author' => 'Sarah Noor', 'year' => 2024]);
    }
}
