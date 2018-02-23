<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PlayRequest extends Model
{
	protected $table = 'play_requests';
	protected $fillable = ['from_user_id', 'to_user_id', 'created_at', 'updated_at'];
}
