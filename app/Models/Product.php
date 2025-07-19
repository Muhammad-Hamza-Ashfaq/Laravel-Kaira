<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'discounted_price',
        'stock_quantity',
        'season',
        'is_active',
        // 'in_stock',
        'is_featured',
        'is_new_arrival',
        'is_best_selling',
        'is_recommended',
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
