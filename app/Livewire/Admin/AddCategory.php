<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class AddCategory extends Component
{
    use WithFileUploads;
    public $name , $slug , $parent_id, $description , $image;
    public $categories = [];

    public function mount()
    {
        $this->categories=Categories::all();
    }

    public function generateSlug($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:1024',
        ]);

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('categories', 'public');
        }

        Categories::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'parent_id' => $this->parent_id,
            'image' => $imagePath,
        ]);

        $this->dispatch('show-toast',message:'✅ Category added successfully!');
        $this->reset();
        $this->mount();
    }
    public function render()
    {
        return view('livewire.admin.add-category');
    }
}
