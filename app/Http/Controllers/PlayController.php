<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use App\Http\Models\PlayRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\FuncController;
use App\Http\Requests;

class PlayController extends Controller
{

	public function select()
	{
		$curUser = User::find(1);
		$PlayRequests = PlayRequest::all();
		return view('play.playselect')->with([
			'curUser' => $curUser,
			'PlayRequests' => $PlayRequests
		]);
	}

    public function hand($IdForPlay)
    {
        $curUser = User::find(1);
        $curPlayRequest = PlayRequest::find($IdForPlay);
        return view('play.playhand')->with([
            'curUser' => $curUser,
            'curPlayRequest' => $curPlayRequest,
        ]);
    }

    public static function result($IdForPlay, $YourHandNum)
    {
        $curUser = User::find(1);
        $curPlayRequest = PlayRequest::find($IdForPlay);
        $AiteHandNum = rand(1, 3);
        $YourHand = FuncController::Hand($YourHandNum);
        $AiteHand = FuncController::Hand($AiteHandNum);
        $Judge = FuncController::Judge($YourHandNum, $AiteHandNum);
        if($Judge !== 'あいこ')
        {
            $curPlayRequest->delete();
        }
        return view('play.playresult')->with([
            'curUser' => $curUser,
            'curPlayRequest' => $curPlayRequest,
            'YourHand' => $YourHand,
            'AiteHand' => $AiteHand,
            'Judge' => $Judge
        ]);
    }
}
