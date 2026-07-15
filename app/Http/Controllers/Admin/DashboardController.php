<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_books' => Book::count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'Pending')->count(),
            'revenue' => Order::whereIn('status', ['Pending', 'Completed'])->sum('total'),
        ];

        return view('admin.dashboard', [
            'stats' => $stats,
        ]);
    }
}