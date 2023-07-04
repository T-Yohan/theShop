<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddCart extends Component



{
    public $product;

    public $quantity = 1;

    public function add()
    {

        if(Auth::user() == null){
            return redirect(route('login'));
        }


        // dd($this->product);
        $cart=Cart::where('user_id',Auth::user()->id)
                    ->where('product_id',$this->product->id)
                    ->first();

        if (isset($cart)) {
            $cart->update([
                'quantity'=> $this->quantity
            ]);
        } else {
            // dd($this->product);
            Cart::create([
                'user_id'=>Auth::user()->id,
                'product_id'=>$this->product->id,
                'quantity'=>$this->quantity,
                'prix'=>$this->product->prix,
            ]);
        }

    }

// redirection vers le panier
    public function goToCart(){
        return redirect(route('cart'));
    }
    public function render()
    {
        return view('livewire.add-cart');
    }


    // public function onChange(){
    //     dd($this->quantity);
    // }
}
