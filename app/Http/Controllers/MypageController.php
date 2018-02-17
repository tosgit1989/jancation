<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use App\Http\Models\PlayScore;
use App\Http\Models\PlayRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

class MyPageController extends Controller
{

	public function index()
	{
		$curUser = User::find(1);
		$curPlayScore = PlayScore::find(1);
		$PlayRequests = PlayRequest::all();
		return view('mypage')->with([
			'curUser' => $curUser,
			'curPlayScore' => $curPlayScore,
			'PlayRequests' => $PlayRequests
		]);
	}
}
