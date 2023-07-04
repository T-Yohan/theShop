<?php

namespace App\View\Components\liste;

use Closure;
use App\Models\Cart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ItemCart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $itemCart = null)
    {
        //
    }

    public function FunctionName() {

        $cartItems = Cart::where('cart_id', Auth::user()->id)->get();

        return view('cart', compact('cartItems'));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.liste.item-cart');
    }
}
