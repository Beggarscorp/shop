<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Categories;

#[Layout('layouts.admin')]
class EditCategory extends Component
{
    use WithFileUploads;

    public $categoryId;
    public $name;
    public $slug;
    public $parent_id;
    public $image;
    public $existingImage;
    public $categories;

    public function mount($id)
    {
        $category = Categories::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->parent_id = $category->parent_id;
        $this->existingImage = $category->image; // assuming `image` column stores path

        $this->categories = Categories::where('id', '!=', $id)->get(); // exclude self
    }

    public function generateSlug($value)
    {
        $this->slug = Str::slug($value);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $this->categoryId,
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:1024', // 1MB
        ]);

        $category = Categories::findOrFail($this->categoryId);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->parent_id = $this->parent_id;

        if ($this->image) {
            $category->image = $this->image->store('categories', 'public');
        }

        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.edit-category');
    }
}
