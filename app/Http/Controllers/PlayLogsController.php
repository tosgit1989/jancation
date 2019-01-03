<?php

namespace App\Http\Controllers;

use DB;
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
		$playLogs = DB::table('play_logs')->where('from_user_id', Auth::user()->id)->orWhere('to_user_id', Auth::user()->id)->orderBy('created_at')->get();
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
		$playLogsFromYou = DB::table('play_logs')->where('from_user_id', Auth::user()->id)->orderBy('created_at')->get();
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
		$playLogsToYou = DB::table('play_logs')->where('to_user_id', Auth::user()->id)->orderBy('created_at')->get();
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
