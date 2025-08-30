<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Carbon;
use App\Product;
use App\Order;

class HomeController
{
    public function index()
    {
        $user = auth()->user();

        // Initialize all variables with default values
        $totalProductsCount = 0;
        $totalOrdersCount = 0;

        $totalProductsCount = Product::count();
        $totalOrdersCount = Order::count();
        
        return view('home', compact(
            'totalProductsCount',
            'totalOrdersCount'
        ));
    }

}
