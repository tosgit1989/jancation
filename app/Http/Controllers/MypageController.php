<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Models\PlayScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
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

	public function index(Request $HttpRequest)
	{
		$HttpRequest->session()->put('BackTo', '/mypage');
		$curPlayScore = PlayScore::find(Auth::user()->id);
		$PlayRequestsFromYou = DB::table('play_requests')
			->leftJoin('users', 'play_requests.to_user_id', '=', 'users.id')
			->where('expired_at', null)
			->where('from_user_id', Auth::user()->id)
			->get();
		return view('mypage')->with([
			'curPlayScore' => $curPlayScore,
			'PlayRequestsFromYou' => $PlayRequestsFromYou
		]);
	}
}
