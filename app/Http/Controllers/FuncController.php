<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayScore;
use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;

class FuncController extends Controller
{
	//  ------------------------------------------------------------
	//  共通関数
	//  ------------------------------------------------------------
	public static function getUserBy($id)
	{
		$users = User::all();
		$nickName = 'undefined';
		foreach ($users as $user)
		{
			if($id == $user->id)
			{
				$nickName = $user->nickname;
			}
		}
		return $nickName;
	}



}
