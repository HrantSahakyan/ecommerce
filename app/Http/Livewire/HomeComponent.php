<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
class HomeComponent extends Component
{
    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.home-component', ['categories' => $categories])->layout('layouts.base');
    }
}
