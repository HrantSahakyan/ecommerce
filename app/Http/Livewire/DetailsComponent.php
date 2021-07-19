<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,$product_price,1,$product_price)-associate('App\Models\Product');
        session()->flash('success_message','Item added in cart.');
        return redirect()->route('product.cart');
    }
    public function render()
    {
        $product = Product::whereSlug($this->slug)->first();
        $related_products = Product::whereCategory_id($product->category_id)->inRandomOrder()->limit(8)->get();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        return view('livewire.details-component',['product'=>$product,
                                                       'related_products' => $related_products,
                                                       'popular_products' => $popular_products,
                                                      ])->layout('layouts.base');

    }
}
