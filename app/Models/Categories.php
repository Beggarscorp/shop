<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Categories extends Model
{
    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'image',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
    public function categoryproducts()
    {
        return $this->hasMany(Products::class, 'category_id');
    }

    public function parent()
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }
}
