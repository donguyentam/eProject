<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable=['user_id', 'order_date','order_detail_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function details() 
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
