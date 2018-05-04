<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayLog;
use App\Http\Models\PlayRequest;
use App\Http\Controllers\FuncController;
use App\Http\Models\PlayScore;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
		$PlayRequestsToYou = PlayRequest::all()->where('expired_at', null)->where('to_user_id', Auth::user()->id);
		return view('play.playselect')->with([
			'PlayRequestsToYou' => $PlayRequestsToYou
		]);
	}

	public function hand($IdForPlay)
	{
		$curPlayRequest = PlayRequest::find($IdForPlay);
		//  対象の申請があなた宛の申請でなければ処理を中断してエラーに飛ばす。
		if( $curPlayRequest->to_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError();
		}
		return view('play.playhand')->with([
			'curPlayRequest' => $curPlayRequest,
		]);
	}

	public function result($IdForPlay, $YourHandNum)
	{
		$curPlayRequest = PlayRequest::find($IdForPlay);
		//  対象の申請があなた宛の申請でなければ処理を中断してエラーに飛ばす。
		if( $curPlayRequest->to_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError();
		}
		$curDateTime = new Carbon();
		$AiteHandNum = rand(1, 3);
		$YourHand = FuncController::Hand($YourHandNum);
		$AiteHand = FuncController::Hand($AiteHandNum);
		$Judge = FuncController::Judge($YourHandNum, $AiteHandNum);
		//  勝負がついた場合
		if($Judge !== 'あいこ')
		{
			$YourWin = ($Judge == 'あなたの勝ち') ? 1 : 0;
			//  プレイスコア更新
			$curPlayScore1 = FuncController::findByUserId($curPlayRequest->to_user_id);
			$curPlayScore2 = FuncController::findByUserId($curPlayRequest->from_user_id);
			$WinCountBef1 = $curPlayScore1->win_count;
			$WinCountBef2 = $curPlayScore2->win_count;
			$LoseCountBef1 = $curPlayScore1->lose_count;
			$LoseCountBef2 = $curPlayScore2->lose_count;
			$curPlayScore1->win_count = $WinCountBef1 + $YourWin;
			$curPlayScore2->win_count = $WinCountBef2 + (1 - $YourWin);
			$curPlayScore1->lose_count = $LoseCountBef1 + (1 - $YourWin);
			$curPlayScore2->lose_count = $LoseCountBef2 + $YourWin;
			$curPlayScore1->save();
			$curPlayScore2->save();
			//  プレイログ作成
			$NewPlayLog = new PlayLog();
			$NewPlayLog->from_user_id = $curPlayRequest->from_user_id;
			$NewPlayLog->to_user_id = $curPlayRequest->to_user_id;
			$NewPlayLog->result = 0;
			$NewPlayLog->save();
			//  プレイリクエスト更新
			if(!isset($curPlayRequest->expired_at))
			{
				$curPlayRequest->expired_at = $curDateTime;
				$curPlayRequest->save();
			}
		}

		return view('play.playresult')->with([
			'curPlayRequest' => $curPlayRequest,
			'YourHand' => $YourHand,
			'AiteHand' => $AiteHand,
			'Judge' => $Judge
		]);
	}

	protected function RedirectToError()
	{
		return view('error')->with([
			'ErrorMsg' => "この申請はあなた宛の申請ではありません。",
		]);
	}
}
