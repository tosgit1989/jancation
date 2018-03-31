<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayRequest;
use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class MyPlayRequestsController extends Controller
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
        $PlayRequests = PlayRequest::all()->where('expired_at', null);
		return view('playrequest.myplayrequests')->with([
			'PlayRequests' => $PlayRequests
		]);
	}
}
