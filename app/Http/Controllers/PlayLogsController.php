<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayLog;

class PlayLogsController extends Controller
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
		$PlayLogs = PlayLog::all();
		return view('index')->with([
			'PlayLogs' => $PlayLogs
		]);
	}
}
