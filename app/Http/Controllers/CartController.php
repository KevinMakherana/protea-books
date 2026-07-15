<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $books = Book::whereIn('id', array_keys($cart))->get();

        $items = $books->map(function (Book $book) use ($cart) {
            return [
                'book' => $book,
                'quantity' => $cart[$book->id],
                'subtotal' => $book->price * $cart[$book->id],
            ];
        });

        $total = $items->sum('subtotal');

        return view('cart.index', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    public function add(Request $request, Book $book): RedirectResponse
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $book->stock_quantity,
        ]);

        $cart = session('cart', []);
        $currentQuantity = $cart[$book->id] ?? 0;
        $newQuantity = $currentQuantity + (int) $request->quantity;

        if ($newQuantity > $book->stock_quantity) {
            return back()->with('error', 'Not enough stock available for that quantity.');
        }

        $cart[$book->id] = $newQuantity;
        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', $book->title . ' added to your cart.');
    }

    public function remove(Book $book): RedirectResponse
    {
        $cart = session('cart', []);
        unset($cart[$book->id]);
        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
}