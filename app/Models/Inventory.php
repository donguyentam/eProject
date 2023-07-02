<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Inventory extends Model
{
    use HasFactory;
    protected $fillable=['id'];
    protected $table = 'product_inventory';
    public function products() 
    {
        return $this->has(Product::class, 'product_inventory_id');
    }
}
