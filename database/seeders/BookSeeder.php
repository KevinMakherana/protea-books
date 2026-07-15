<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $fiction = Category::where('slug', 'fiction')->first();
        $nonFiction = Category::where('slug', 'non-fiction')->first();
        $saAuthors = Category::where('slug', 'south-african-authors')->first();

        $books = [
            [
                'category_id' => $fiction->id,
                'title' => 'The Midnight Library',
                'author' => 'Matt Haig',
                'description' => 'A novel about all the choices that go into a life well lived.',
                'price' => 289.99,
                'stock_quantity' => 15,
            ],
            [
                'category_id' => $nonFiction->id,
                'title' => 'Sapiens: A Brief History of Humankind',
                'author' => 'Yuval Noah Harari',
                'description' => 'An exploration of how Homo sapiens came to dominate the world.',
                'price' => 349.50,
                'stock_quantity' => 10,
            ],
            [
                'category_id' => $saAuthors->id,
                'title' => 'Disgrace',
                'author' => 'J.M. Coetzee',
                'description' => 'A Booker Prize-winning novel set in post-apartheid South Africa.',
                'price' => 259.00,
                'stock_quantity' => 8,
            ],
            [
                'category_id' => $saAuthors->id,
                'title' => 'Born a Crime',
                'author' => 'Trevor Noah',
                'description' => 'Stories from a South African childhood.',
                'price' => 299.99,
                'stock_quantity' => 20,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}