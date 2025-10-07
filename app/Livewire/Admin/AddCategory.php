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
    public $name , $slug , $description , $image;

    public function generateSlug($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:1024',
        ]);

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('categories', 'public');
        }

        Categories::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $imagePath,
        ]);

        session()->flash('success', '✅ Category added successfully!');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.add-category');
    }
}
