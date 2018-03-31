<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'users';
	protected $fillable = ['name', 'nickname', 'email', 'password', 'created_at', 'updated_at'];
}
