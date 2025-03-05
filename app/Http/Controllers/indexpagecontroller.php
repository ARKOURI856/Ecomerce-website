<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;

class indexpagecontroller extends Controller
{
    public function index(product $products)
    {
        $categories = category::all();
        $products = Product::whereIn('id', [1, 2, 3])->get();
        return view('indexpage',['products' => $products],compact('categories'));
    }
}
