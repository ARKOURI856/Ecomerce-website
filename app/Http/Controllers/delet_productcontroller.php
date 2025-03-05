<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class delet_productcontroller extends Controller
{

    public function delet(Product $product ){
        $product->delete();
        return to_route('product_list')->with('success','the product is deleted successfly');
    }
}
