<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    public $sorting , $pagesize;

    public function mount()
    {
        $this->sorting = "price";
        $this->pagesize = 12;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart.');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting == 'date'){
            $products = Product::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif ($this->sorting == 'price-desc'){
            $products = Product::orderBy('regular_price','DESC')->paginate($this->pagesize);
        }else {
            $products = Product::orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        if(count($products) == 0){
            session()->flash('error_message','You can not select this page size, just change it.');
        }
        $categories = Category::all();
        return view('livewire.shop-component',['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
    }
}
