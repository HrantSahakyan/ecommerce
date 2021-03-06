<?php

namespace App\Http\Livewire;

use Cart;
use Livewire\Component;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }

    public function removeProduct($rowId)
    {
        $product = Cart::get($rowId);
        $qty = 0;
        Cart::update($rowId,$qty);
    }

    public function removeAll()
    {
        Cart::destroy();
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
