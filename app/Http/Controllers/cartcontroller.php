<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;

use Illuminate\Support\Facades\Auth;
class CartController extends Controller

{
    public function index()
    {
        // Retrieve cart items for the logged-in user
        $cartItems = DB::table('carts')
            ->where('user_id', auth()->user()->id) // Assuming the user is logged in
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('carts.*', 'products.name', 'products.photo', 'products.price')
            ->get();
            $categories = category::all();

        return view('cart.index', ['cartItems' => $cartItems],compact('categories'));

    }

    public function add(Request $request)
    {
        $userId = Auth::id(); // Assuming the user is logged in
        $productId = $request->input('product_id');

        // Check if the product is already in the cart
        $cartItem = DB::table('carts')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
            $categories = category::all();
        if ($cartItem) {
            // Return a JSON response indicating the product is already in the cart
            return view('producterror',compact('categories'));
        }

        DB::table('carts')->insert([
            'user_id'=> Auth::id(),
           'product_id'=> $request->input('product_id'),
           'qty'=> $request ->input('qty'),
           'created_at' => now(),
           'updated_at' => now(),
        ]);
        $categories = category::all();

        return view('productsuccess',compact('categories'));
    }
    public function destroy($id)
    {
        $cartItem = DB::table('carts')->where('id', $id)->first();
        $categories = category::all();
        if ($cartItem) {
            DB::table('carts')->where('id', $id)->delete();
            return view('cart.empty',compact('categories'));
        }

        return to_route('cart.index')->with('success','the product is deleted successfly');
    }
}
?>
