<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'users';
	protected $fillable = ['nickname', 'email', 'psw', 'created_at', 'updated_at'];
}
