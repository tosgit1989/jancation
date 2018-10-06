<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayLog;
use App\Http\Models\PlayRequest;
use App\Http\Models\User;
use App\Http\Models\PlayScore;
use Illuminate\Http\Request;
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

	public function select(Request $HttpRequest)
	{
		$HttpRequest->session()->put('BackTo', '/playselect');
		$PlayRequestsToYou = PlayRequest::all()->where('expired_at', null)->where('to_user_id', Auth::user()->id);
		foreach ($PlayRequestsToYou as $pr)
		{
			$UserOfCurPlayRequest = User::find($pr->from_user_id);
			$pr->user_nickname = $UserOfCurPlayRequest->nickname;
		}
		return view('play.playselect')->with([
			'PlayRequestsToYou' => $PlayRequestsToYou
		]);
	}

	public function hand(Request $HttpRequest, $IdForPlay)
	{
		$BackTo = $HttpRequest->session()->get('BackTo', '/');
		$curPlayRequest = PlayRequest::find($IdForPlay);
		$UserOfCurPlayRequest = User::find($curPlayRequest->from_user_id);
		$curPlayRequest->user_nickname = $UserOfCurPlayRequest->nickname;

		//  対象の申請があなた宛の申請でなければ処理を中断してエラーに飛ばす。
		if( $curPlayRequest->to_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($BackTo);
		}
		return view('play.playhand')->with([
			'curPlayRequest' => $curPlayRequest,
		]);
	}

	public function result(Request $HttpRequest, $IdForPlay, $YourHandNum)
	{
		$BackTo = $HttpRequest->session()->get('BackTo', '/');
		$curPlayRequest = PlayRequest::find($IdForPlay);
		$UserOfCurPlayRequest = User::find($curPlayRequest->from_user_id);
		$curPlayRequest->user_nickname = $UserOfCurPlayRequest->nickname;

		//  対象の申請があなた宛の申請でなければ処理を中断してエラーに飛ばす。
		if( $curPlayRequest->to_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($BackTo);
		}
		$curDateTime = new Carbon();
		$AiteHandNum = rand(1, 3);
		$YourHand = $this->getHand($YourHandNum);
		$AiteHand = $this->getHand($AiteHandNum);
		$Judge = $this->Judge($YourHandNum, $AiteHandNum);
		//  勝負がついた場合
		if($Judge !== 'あいこ')
		{
			$YourWin = ($Judge == 'あなたの勝ち') ? 1 : 0;
			//  プレイスコア更新
			$curPlayScore1 = $this->findByUserId($curPlayRequest->to_user_id);
			$curPlayScore2 = $this->findByUserId($curPlayRequest->from_user_id);
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
				$EditPlayRequest = PlayRequest::find($curPlayRequest->id);
				$EditPlayRequest->expired_at = $curDateTime;
				$EditPlayRequest->save();
			}
		}

		return view('play.playresult')->with([
			'curPlayRequest' => $curPlayRequest,
			'YourHand' => $YourHand,
			'AiteHand' => $AiteHand,
			'Judge' => $Judge
		]);
	}
	
	protected function findByUserId($UserId)
	{
		$PlayScores = PlayScore::all()->where('user_id', $UserId);
		if(count($PlayScores) == 0)
		{
			//  まだ作成していない場合は作成
			$NewPlayScore = new PlayScore();
			$NewPlayScore->user_id = $UserId;
			$NewPlayScore->win_count = 0;
			$NewPlayScore->lose_count = 0;
			$NewPlayScore->save();
			$PlayScore = $NewPlayScore;
		}
		else
		{
			$PlayScore = $PlayScores->first();
		}
		return $PlayScore;
	}

	protected function getHand($HandId)
	{
		$HandList = [ 1 => 'グー', 2 => 'チョキ', 3 => 'パー' ];
		return $HandList[$HandId];
	}

	protected function Judge($YourHandId, $AiteHandId)
	{
		$JudgeId = ($YourHandId > $AiteHandId) ? $YourHandId - $AiteHandId : $YourHandId - $AiteHandId + 3;
		$JudgeList = [ 1 => 'あなたの負け', 2 => 'あなたの勝ち', 3 => 'あいこ' ];
		return $JudgeList[$JudgeId];
	}
	
	protected function RedirectToError($BackTo)
	{
		return view('error')->with([
			'BackTo' => $BackTo,
			'ErrorMsg' => "この申請はあなた宛の申請ではありません。",
		]);
	}
}
