<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'category_id', 'brand_id', 'stock_status', 'featured', 'short_description', 'description', 'image', 'images', 'regular_price', 'sale_price', 'SKU', 'quantity'];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
