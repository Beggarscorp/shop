<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Products as Product;
use App\Models\Categories as Category;
use Illuminate\Support\Str;

#[Layout('layouts.admin')]
class EditProduct extends Component
{
    use WithFileUploads;

    public $productId;
    public $productname, $slug, $discription, $price, $sale_price, $category_id, $stock;
    public $best_seller, $productimage, $sizeandfit, $materialandcare;
    public $spacification, $impact_product, $productimagegallery, $min_order, $status;

    public $new_productimage;
    public $new_productimagegallery = [];

    public function mount($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $product->id;

        $this->fill([
            'productname' => $product->productname,
            'slug' => $product->slug,
            'discription' => $product->discription,
            'price' => $product->price,
            'sale_price' => $product->sale_price,
            'category_id' => $product->category_id,
            'stock' => $product->stock,
            'best_seller' => $product->best_seller,
            'productimage' => $product->productimage,
            'sizeandfit' => $product->sizeandfit,
            'materialandcare' => $product->materialandcare,
            'spacification' => $product->spacification,
            'impact_product' => $product->impact_product,
            'productimagegallery' => $product->productimagegallery,
            'min_order' => $product->min_order,
            'status' => $product->status,
        ]);
        $this->productimagegallery = $product->productimagegallery 
        ? json_decode($product->productimagegallery, true) 
        : [];
    }

    public function generateSlug($value)
    {
        $this->slug = Str::slug($value);
    }

    public function updateProduct()
    {
        $this->validate([
            'productname' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $this->productId,
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'new_productimage' => 'nullable|image|max:2048',
            'new_productimagegallery.*' => 'nullable|image|max:2048',
        ]);

        $product = Product::findOrFail($this->productId);

        // Upload single product image
        if ($this->new_productimage) {
            $path = $this->new_productimage->store('products', 'public');
            $product->productimage = $path;
        }

        // Upload multiple gallery images (optional)
        if ($this->new_productimagegallery) {
            $galleryPaths = [];
            foreach ($this->new_productimagegallery as $img) {
                $galleryPaths[] = $img->store('products/gallery', 'public');
            }
            $product->productimagegallery = json_encode($galleryPaths);
        }

        // Update product details
        $product->update([
            'productname' => $this->productname,
            'slug' => $this->slug,
            'discription' => $this->discription,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'category_id' => $this->category_id,
            'stock' => $this->stock,
            'best_seller' => $this->best_seller,
            'sizeandfit' => $this->sizeandfit,
            'materialandcare' => $this->materialandcare,
            'spacification' => $this->spacification,
            'impact_product' => $this->impact_product,
            'min_order' => $this->min_order,
            'status' => $this->status,
        ]);

        $this->dispatch('show-toast',message:'Product updated successfully!');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.edit-product',['categories'=>$categories]);
    }
}
