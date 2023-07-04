<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }

    // fonction pour effacer un élément du caddie
    public function deleteOne(Cart $cart)
    {
        $cart->delete();

        // redirige vers la vue du caddiez
        return redirect(route('cart'));
    }

    // fonction pour effacer un élément du caddie
    public function delete()
    {
        Cart::where('user_id',Auth::user()->id)
                ->delete();
        // redirige vers la vue du caddiez
        return redirect(route('cart'));
    }
}
