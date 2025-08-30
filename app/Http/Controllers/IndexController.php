<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Status;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::select(sprintf('%s.*', (new Product)->getTable()))->get();

        return view('index', compact('products'));
    }
}
