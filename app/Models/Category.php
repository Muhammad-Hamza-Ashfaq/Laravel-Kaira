<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
