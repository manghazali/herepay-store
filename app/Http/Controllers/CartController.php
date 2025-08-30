<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Order;

class CartController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'cart_items' => 'required',
        ]);

        $customerName = $request->customer_name;
        $customerEmail = $request->customer_email;
        $cartItems = json_decode($request->cart_items, true);

        // Example: calculate total
        $total = collect($cartItems)->sum('price');

        // You can save order to DB, send email, etc.
        $order = new Order();
        $order->customer_name = $customerName;
        $order->customer_email = $customerEmail;
        $order->total_price = $total;
        $order->save();

        // Return view if needed
        $products = Product::all();
        return view('index', compact('products'));
    }

}
