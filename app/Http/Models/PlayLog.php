<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PlayLog extends Model
{
	protected $table = 'play_logs';
	protected $fillable = ['from_user_id', 'to_user_id', 'result', 'created_at'];
}
