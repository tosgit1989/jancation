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

	public static function findByUserId($UserId)
	{
		$PlayScores = PlayScore::all()->where('user_id', $UserId);
		if(count($PlayScores) == 0)
		{
			//  まだ作成していない場合は作成
			$NewPlayScore = new PlayScore();
			$NewPlayScore->user_id = $UserId;
			$NewPlayScore->win_count = 0;
			$NewPlayScore->lose_count = 0;
			$NewPlayScore->save();
			$PlayScore = $NewPlayScore;
		}
		else
		{
			$PlayScore = $PlayScores->first();
		}
		return $PlayScore;
	}

	public static function UsersOption()
	{
		//  ユーザープルダウンは現在ログイン中のユーザーを含まないようにする
		$Users = User::all()->where('id', '<>', Auth::user()->id);
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
