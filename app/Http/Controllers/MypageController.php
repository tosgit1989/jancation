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
		$PlayRequests = PlayRequest::all();
		return view('mypage')->with([
			'curPlayScore' => $curPlayScore,
			'PlayRequests' => $PlayRequests
		]);
	}
}
