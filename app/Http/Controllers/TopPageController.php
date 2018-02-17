<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayScore;
use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class TopPageController extends Controller
{
	public function index()
	{
		//$PlayScores = Playscore::all()->orderBy('if( winCount+loseCount>0, winCount/(winCount+loseCount), 0 )');
		$PlayScores = PlayScore::all();
		return view('index')->with([
			'PlayScores' => $PlayScores,
		]);
	}

	public static function getUserBy($id)
	{
		$Users = User::all();
		$nickname = 'undefined';
		foreach ($Users as $User)
		{
			if($id == $User->id)
			{
				$nickname = $User->nickname;
			}
		}
		return $nickname;
	}
}
