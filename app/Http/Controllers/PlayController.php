<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use App\Http\Models\PlayRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\FuncController;
use App\Http\Requests;
use Carbon\Carbon;

class PlayController extends Controller
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

	public function select()
	{
		$PlayRequests = PlayRequest::all()->where('expired_at', null);
		return view('play.playselect')->with([
			'PlayRequests' => $PlayRequests
		]);
	}

	public function hand($IdForPlay)
	{
		$curPlayRequest = PlayRequest::find($IdForPlay);
		return view('play.playhand')->with([
			'curPlayRequest' => $curPlayRequest,
		]);
	}

	public static function result($IdForPlay, $YourHandNum)
	{
		$curPlayRequest = PlayRequest::find($IdForPlay);
        $curDateTime = new Carbon();
		$AiteHandNum = rand(1, 3);
		$YourHand = FuncController::Hand($YourHandNum);
		$AiteHand = FuncController::Hand($AiteHandNum);
		$Judge = FuncController::Judge($YourHandNum, $AiteHandNum);
		if($Judge !== 'あいこ' and !isset($curPlayRequest->expired_at))
		{
			$curPlayRequest->expired_at = $curDateTime;
            $curPlayRequest->save();
		}
		return view('play.playresult')->with([
			'curPlayRequest' => $curPlayRequest,
			'YourHand' => $YourHand,
			'AiteHand' => $AiteHand,
			'Judge' => $Judge
		]);
	}
}
