<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class AddProduct extends Component
{
    use WithFileUploads;

    public $productname, $slug, $discription, $price, $sale_price, $category_id,
       $stock, $best_seller = false, $productimage, $sizeandfit, $materialandcare,
       $spacification, $impact_product, $productimagegallery = [], $min_order = 1, $status = 'active';

    public $categories; // load categories in mount()

     public function mount()
    {
        $this->categories = Categories::all();
    }

    public function generateSlug($value)
    {
        // Auto-generate slug from product name
        $this->slug = Str::slug($value);
    }

     public function save()
    {

        // Validation
        $this->validate([
            'productname' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'productimage' => 'nullable|image|max:1024',
            'productimagegallery.*' => 'nullable|image|max:1024',
            'min_order' => 'required|integer|min:1',
        ]);

        // Upload main product image
        $mainImage = $this->productimage ? $this->productimage->store('products', 'public') : null;

        // Upload gallery images
        $galleryImages = [];
        if ($this->productimagegallery) {
            foreach ($this->productimagegallery as $image) {
                $galleryImages[] = $image->store('products/gallery', 'public');
            }
        }

        // Save product
        Products::create([
            'productname' => $this->productname,
            'slug' => $this->slug,
            'discription' => $this->discription,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'category_id' => $this->category_id,
            'stock' => $this->stock,
            'best_seller' => $this->best_seller,
            'productimage' => $mainImage,
            'productimagegallery' => json_encode($galleryImages),
            'sizeandfit' => $this->sizeandfit,
            'materialandcare' => $this->materialandcare,
            'spacification' => $this->spacification,
            'impact_product' => $this->impact_product,
            'min_order' => $this->min_order,
            'status' => $this->status,
        ]);

        // Reset form fields
        $this->reset([
            'productname', 'slug', 'discription', 'price', 'sale_price', 'category_id', 'stock',
            'best_seller', 'productimage', 'productimagegallery', 'sizeandfit', 'materialandcare',
            'spacification', 'impact_product', 'min_order', 'status'
        ]);

        session()->flash('success', 'Product added successfully!');
    }

    public function render()
    {
        return view('livewire.admin.add-product');
    }
}
