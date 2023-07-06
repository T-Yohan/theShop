<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
//calcul le total du tableau en fonction d'un élément du caddie
    private function calculTotal($cartItems)
    {
        $total = 0;

        foreach ($cartItems as $cart) {

            $total = $total + ($cart->quantity * $cart->product->prix);
        }
        return $total;
    }



    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        // dd($cartItems);
        $total = $this->calculTotal($cartItems);
        return view('cart', compact('cartItems','total'));


    }

    public function update(
        Cart $cart,
        $quantity = 1
        /*Request $request*/
    ) {

        //mise à jour de la quantité en base
        $cart->update(['quantity' => $quantity/*$request->quantity*/]);
        $total = 0;
        //read all item cart user

        $cartItems = Cart::where('user_id', Auth::user()->id)->get();

        $total = $this->calculTotal($cartItems);

        return response()->json([
            'result=>true',
            'total' => $total
        ]);
        //retour d'un message pour confirmer le résultat
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
        Cart::where('user_id', Auth::user()->id)
            ->delete();
        // redirige vers la vue du caddiez
        return redirect(route('cart'));
    }
}
