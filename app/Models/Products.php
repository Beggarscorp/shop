<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Products extends Model
{
    protected $fillable = [
        'productname',
        'slug',
        'discription',
        'price',
        'sale_price',
        'category_id',
        'stock',
        'best_seller',
        'productimage',
        'sizeandfit',
        'materialandcare',
        'spacification',
        'impact_product',
        'productimagegallery',
        'min_order',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }


}


