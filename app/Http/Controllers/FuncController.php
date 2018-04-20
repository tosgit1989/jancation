<?php

namespace App\Http\Controllers;

use App\Http\Models\User;

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

	public static function UsersOption()
	{
		$Users = User::all();
		$Arr = [];
		foreach($Users as $User)
		{
			$Arr[] = [ $User->id => $User->nickname ];
		}
		return $Arr;
	}

	public static function Hand($HandId)
	{
		$HandList = [ 1 => 'グー', 2 => 'チョキ', 3 => 'パー' ];
		return $HandList[$HandId];
	}

	public static function Judge($YourHandId, $AiteHandId)
	{
		$JudgeId = ($YourHandId > $AiteHandId) ? $YourHandId - $AiteHandId : $YourHandId - $AiteHandId + 3;
		$JudgeList = [ 1 => 'あなたの負け', 2 => 'あなたの勝ち', 3 => 'あいこ' ];
		return $JudgeList[$JudgeId];
	}
}
