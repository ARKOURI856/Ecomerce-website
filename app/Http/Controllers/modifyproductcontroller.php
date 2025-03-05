<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class modifyproductcontroller extends Controller
{
    public function edit(Product $product){

        $categories = category::all();
        $product = DB::table('products')
            ->where('products.id','id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.title')
            ->get();

        return view('admin.edit_product',compact('product'),compact('categories'));
    }
}
