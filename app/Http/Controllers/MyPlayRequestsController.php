<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayRequest;
use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class MyPlayRequestsController extends Controller
{
	public function index()
	{
		$curUser = User::find(1);
		$PlayRequests = PlayRequest::all();
		return view('playrequest.myplayrequests')->with([
			'curUser' => $curUser,
			'PlayRequests' => $PlayRequests
		]);
	}
}
