<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddCart extends Component



{
    public $product;

    public function add()
    {
        // dd($this->product);
        $cart=Cart::where('user_id',Auth::user()->id)
                    ->where('product_id',$this->product->id)
                    ->first();

        if (isset($cart)) {
            # code...
        } else {
            // dd($this->product);
            Cart::create([
                'user_id'=>Auth::user()->id,
                'product_id'=>$this->product->id,
                'quantity'=>1,
                'prix'=>$this->product->prix,
            ]);
        }






    }

    public function render()
    {
        return view('livewire.add-cart');
    }
}
