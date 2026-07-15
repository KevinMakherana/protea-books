<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('category');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $books = $query->orderBy('title')->paginate(8)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('books.index', [
            'books' => $books,
            'categories' => $categories,
            'selectedCategory' => $request->category,
        ]);
    }

    public function show(Book $book)
    {
        $book->load('category');

        return view('books.show', [
            'book' => $book,
        ]);
    }
}