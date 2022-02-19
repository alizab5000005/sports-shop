<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'image',
        'original_price',
        'selling_price',
        'qty',
        'short_desc',
        'long_desc',
        'status',
        'popular',
        'featured'
    ];


    public function categories() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brands() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
