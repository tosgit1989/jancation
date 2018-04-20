<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayScore;
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
		//$PlayScores = Playscore::all()->orderBy('if( winCount+loseCount>0, winCount/(winCount+loseCount), 0 )');
		$PlayScores = PlayScore::all();
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
