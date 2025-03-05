<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Category;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        $cartItems = DB::table('carts')
            ->where('user_id', auth()->user()->id) // Assuming the user is logged in
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('carts.*', 'products.name', 'products.photo', 'products.price')
            ->get();

        $categories = Category::all();

        $totalAmount = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });

        return view('payements.payment', compact('cartItems', 'totalAmount', 'categories'));
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                'amount' => $request->input('amount') * 100, // Amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Invoice Payment',
            ]);

            // Handle successful payment
            return back()->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            // Handle error
            return back()->with('error', 'Payment failed!');
        }
    }
}
?>