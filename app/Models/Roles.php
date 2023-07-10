<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable=['role_id', 'slug'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

}
