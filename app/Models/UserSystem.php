<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSystem extends Model
{
    use HasFactory;
    protected $table = 'users_system';
    protected $fillable = ['user_name', 'password', 'user_level'];
}
