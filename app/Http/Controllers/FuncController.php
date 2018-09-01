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
	public static function getUserBy($Id)
	{
		$Users = User::all();
		$NickName = 'undefined';
		foreach ($Users as $User)
		{
			if($Id == $User->id)
			{
				$NickName = $User->nickname;
			}
		}
		return $NickName;
	}



}
