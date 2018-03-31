<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use App\Http\Models\PlayScore;
use App\Http\Models\PlayRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

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
		$curPlayScore = PlayScore::find(1);
		$PlayRequests = PlayRequest::all();
		return view('mypage')->with([
			'curPlayScore' => $curPlayScore,
			'PlayRequests' => $PlayRequests
		]);
	}
}
