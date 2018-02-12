<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PlayScore extends Model
{
	protected $table = 'playscores';
	protected $fillable = ['user_id', 'win_count', 'lose_count', 'created_at'];
}
