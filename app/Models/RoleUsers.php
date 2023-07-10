<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUsers extends Model
{
    use HasFactory;
    protected $table = 'role_users';
    protected $fillable=['user_id', 'role_id'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

}
