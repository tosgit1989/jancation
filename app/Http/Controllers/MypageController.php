<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayRequest;
use App\Http\Models\User;
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
		$PlayRequestsFromYou = PlayRequest::all()->where('expired_at', null)->where('from_user_id', Auth::user()->id);
		foreach ($PlayRequestsFromYou as $pr)
		{
			$UserPerPlayRequest = User::find($pr->to_user_id);
			$pr->user_nickname = $UserPerPlayRequest->nickname;
		}
		return view('mypage')->with([
			'curPlayScore' => $curPlayScore,
			'PlayRequestsFromYou' => $PlayRequestsFromYou
		]);
	}
}
