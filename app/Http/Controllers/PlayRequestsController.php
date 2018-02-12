<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

class PlayRequestsController extends Controller
{
	public function index()
	{
		$PlayRequests = PlayRequest::all();
		return view('index')->with([
			'playrequests' => $PlayRequests
		]);
	}
}
