<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory() {
        return $this->belongsTo(ProductSubCategory::class, 'sub_category_id', 'id');
    }

    public function productSize() {
        return $this->belongsTo(ProductSize::class, 'product_size_id', 'id');
    }
    public function images() {
        return $this->hasMany(ProductImage::class) ->orderBy('sort');
    }
}
