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

	public function index(Request $httpRequest)
	{
		$httpRequest->session()->put('backTo', '/mypage');
		$curPlayScore = PlayScore::find(Auth::user()->id);
		$playRequestsFromYou = PlayRequest::all()->where('expired_at', null)->where('from_user_id', Auth::user()->id);
		foreach ($playRequestsFromYou as $playRequest)
		{
			$userPerPlayRequest = User::find($playRequest->to_user_id);
			$playRequest->user_nickname = $userPerPlayRequest->nickname;
		}
		return view('mypage')->with([
			'curPlayScore' => $curPlayScore,
			'playRequestsFromYou' => $playRequestsFromYou
		]);
	}
}
