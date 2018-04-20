<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayRequest;
use Illuminate\Support\Facades\Auth;

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
        $PlayRequests = PlayRequest::all()->where('expired_at', null)->where('to_user_id', Auth::user()->id);
		return view('playrequests.yourplayrequests')->with([
			'PlayRequests' => $PlayRequests
		]);
	}
}
