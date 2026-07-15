<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $books = Book::whereIn('id', array_keys($cart))->get();

        $items = $books->map(function (Book $book) use ($cart) {
            return [
                'book' => $book,
                'quantity' => $cart[$book->id],
                'subtotal' => $book->price * $cart[$book->id],
            ];
        });

        $total = $items->sum('subtotal');

        return view('checkout.show', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'shipping_address' => 'required|string|max:500',
        ]);

        $books = Book::whereIn('id', array_keys($cart))->get()->keyBy('id');

        foreach ($cart as $bookId => $quantity) {
            if (!isset($books[$bookId]) || $books[$bookId]->stock_quantity < $quantity) {
                return redirect()->route('cart.index')
                    ->with('error', 'Sorry, one or more items in your cart are no longer available in that quantity.');
            }
        }

        $order = DB::transaction(function () use ($validated, $cart, $books) {
            $total = 0;
            foreach ($cart as $bookId => $quantity) {
                $total += $books[$bookId]->price * $quantity;
            }

            $order = Order::create([
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'shipping_address' => $validated['shipping_address'],
                'total' => $total,
                'status' => 'Pending',
            ]);

            foreach ($cart as $bookId => $quantity) {
                $book = $books[$bookId];

                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $book->id,
                    'book_title' => $book->title,
                    'unit_price' => $book->price,
                    'quantity' => $quantity,
                ]);

                $book->decrement('stock_quantity', $quantity);
            }

            return $order;
        });

        session()->forget('cart');

        return redirect()->route('checkout.confirmation', $order)
            ->with('success', 'Order placed successfully!');
    }

    public function confirmation(Order $order)
    {
        $order->load('items');

        return view('checkout.confirmation', [
            'order' => $order,
        ]);
    }
}
