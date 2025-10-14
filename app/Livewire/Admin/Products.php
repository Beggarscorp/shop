<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Products as Allproducts;

#[Layout('layouts.admin')]
class Products extends Component
{
    public function deleteProduct($id)
    {
        $product=Allproducts::find($id);
        $product->delete();
        $this->dispatch('show-toast',message:'Product deleted successfully!');
    }
    public function render()
    {
        $products=Allproducts::orderBy('id','desc')->get();
        return view('livewire.admin.products',[
            'products'=>$products,
        ]);
    }
}
