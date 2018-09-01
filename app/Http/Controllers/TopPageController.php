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
	    $sql = ''
            .'select * from play_scores '
            .'left join users on play_scores.user_id=users.id '
            .'order by if( win_count+lose_count>0, win_count/(win_count+lose_count), 0 ) DESC';
		$PlayScores = DB::select($sql);
		return view('index')->with([
			'PlayScores' => $PlayScores,
		]);
	}
}
