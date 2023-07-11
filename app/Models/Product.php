<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product_detail';
    protected $fillable=['name', 'slug', 'price', 'image', 'product_category_id', 'product_inventory_id', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'product_category_id');
    }
    
}
