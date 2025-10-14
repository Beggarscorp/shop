<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Categories as Category;

#[Layout('layouts.admin')]
class Categories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories=Category::all();
        
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $this->dispatch('show-toast',message:'Category deleted successfully!');
        $this->mount(); // refresh list
    }

    public function render()
    {
        return view('livewire.admin.categories');
    }
}
