<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // khai báo các cột dùng cho mass assignment
    protected $fillable=['name', 'slug'];
    protected $table = 'product_category';
    public function products() 
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }
}
