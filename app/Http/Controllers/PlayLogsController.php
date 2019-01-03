<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayLog;
use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $playLogs = PlayLog::all()->where('from_user_id', Auth::user()->id)->where('to_user_id', Auth::user()->id);
        foreach ($playLogs as $playLog)
        {
            $fromUserPerPlayLog = User::find($playLog->from_user_id);
            $toUserPerPlayLog = User::find($playLog->to_user_id);
            $playLog->from_user_nickname = $fromUserPerPlayLog->nickname;
            $playLog->to_user_nickname = $toUserPerPlayLog->nickname;
        }
        return view('playlogs')->with([
            'playLogs' => $playLogs
        ]);
    }

	public function fromYou()
	{
		$playLogsFromYou = PlayLog::all()->where('from_user_id', Auth::user()->id);
        foreach ($playLogsFromYou as $playLog)
        {
            $fromUserPerPlayLog = User::find($playLog->from_user_id);
            $toUserPerPlayLog = User::find($playLog->to_user_id);
            $playLog->from_user_nickname = $fromUserPerPlayLog->nickname;
            $playLog->to_user_nickname = $toUserPerPlayLog->nickname;
        }
		return view('playlogs')->with([
			'playLogs' => $playLogsFromYou
		]);
	}

    public function toYou()
    {
        $playLogsToYou = PlayLog::all()->where('to_user_id', Auth::user()->id);
        foreach ($playLogsToYou as $playLog)
        {
            $fromUserPerPlayLog = User::find($playLog->from_user_id);
            $toUserPerPlayLog = User::find($playLog->to_user_id);
            $playLog->from_user_nickname = $fromUserPerPlayLog->nickname;
            $playLog->to_user_nickname = $toUserPerPlayLog->nickname;
        }
        return view('playlogs')->with([
            'playLogs' => $playLogsToYou
        ]);
    }
}
