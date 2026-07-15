<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiction', 'slug' => 'fiction'],
            ['name' => 'Non-Fiction', 'slug' => 'non-fiction'],
            ['name' => 'Children\'s Books', 'slug' => 'childrens-books'],
            ['name' => 'South African Authors', 'slug' => 'south-african-authors'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}