<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayScore;
use App\Http\Models\PlayRequest;
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

	public function index()
	{
		$curPlayScore = PlayScore::find(Auth::user()->id);
		$PlayRequestsFromYou = PlayRequest::all()->where('expired_at', null)->where('from_user_id', Auth::user()->id);
		return view('mypage')->with([
			'curPlayScore' => $curPlayScore,
			'PlayRequestsFromYou' => $PlayRequestsFromYou
		]);
	}
}
