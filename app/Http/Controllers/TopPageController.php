<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Models\User;

class TopPageController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$PlayScores = DB::select('select * from play_scores order by if( win_count+lose_count>0, win_count/(win_count+lose_count), 0 ) DESC');
		return view('index')->with([
			'PlayScores' => $PlayScores,
		]);
	}

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
