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

	public function select(Request $httpRequest)
	{
		$httpRequest->session()->put('backTo', '/playselect');
		$playRequestsToYou = PlayRequest::all()->where('expired_at', null)->where('to_user_id', Auth::user()->id);
		foreach ($playRequestsToYou as $playRequest)
		{
			$userOfCurPlayRequest = User::find($playRequest->from_user_id);
			$playRequest->user_nickname = $userOfCurPlayRequest->nickname;
		}
		return view('play.playselect')->with([
			'playRequestsToYou' => $playRequestsToYou
		]);
	}

	public function hand(Request $httpRequest, $idForPlay)
	{
		$backTo = $httpRequest->session()->get('backTo', '/');
		$curPlayRequest = PlayRequest::find($idForPlay);
		$userOfCurPlayRequest = User::find($curPlayRequest->from_user_id);
		$curPlayRequest->user_nickname = $userOfCurPlayRequest->nickname;

		//  対象の申請があなた宛の申請でなければ処理を中断してエラーに飛ばす。
		if( $curPlayRequest->to_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($backTo);
		}
		return view('play.playhand')->with([
			'curPlayRequest' => $curPlayRequest,
		]);
	}

	public function result(Request $httpRequest, $idForPlay, $yourHandNum)
	{
		$backTo = $httpRequest->session()->get('backTo', '/');
		$curPlayRequest = PlayRequest::find($idForPlay);
		$userOfCurPlayRequest = User::find($curPlayRequest->from_user_id);
		$curPlayRequest->user_nickname = $userOfCurPlayRequest->nickname;

		//  対象の申請があなた宛の申請でなければ処理を中断してエラーに飛ばす。
		if( $curPlayRequest->to_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($backTo);
		}
		$curDateTime = new Carbon();
		$aiteHandNum = rand(1, 3);
		$yourHand = $this->getHand($yourHandNum);
		$aiteHand = $this->getHand($aiteHandNum);
		$judge = $this->Judge($yourHandNum, $aiteHandNum);
		//  勝負がついた場合
		if($judge !== 'あいこ')
		{
			$yourWin = ($judge == 'あなたの勝ち') ? 1 : 0;
			//  プレイスコア更新
			$curPlayScore1 = $this->findByUserId($curPlayRequest->to_user_id);
			$curPlayScore2 = $this->findByUserId($curPlayRequest->from_user_id);
			$winCountBef1 = $curPlayScore1->win_count;
			$winCountBef2 = $curPlayScore2->win_count;
			$loseCountBef1 = $curPlayScore1->lose_count;
			$loseCountBef2 = $curPlayScore2->lose_count;
			$curPlayScore1->win_count = $winCountBef1 + $yourWin;
			$curPlayScore2->win_count = $winCountBef2 + (1 - $yourWin);
			$curPlayScore1->lose_count = $loseCountBef1 + (1 - $yourWin);
			$curPlayScore2->lose_count = $loseCountBef2 + $yourWin;
			$curPlayScore1->save();
			$curPlayScore2->save();
			//  プレイログ作成
			$newPlayLog = new PlayLog();
			$newPlayLog->from_user_id = $curPlayRequest->from_user_id;
			$newPlayLog->to_user_id = $curPlayRequest->to_user_id;
			$newPlayLog->result = 0;
			$newPlayLog->save();
			//  プレイリクエスト更新
			if(!isset($curPlayRequest->expired_at))
			{
				$editPlayRequest = PlayRequest::find($curPlayRequest->id);
				$editPlayRequest->expired_at = $curDateTime;
				$editPlayRequest->save();
			}
		}

		return view('play.playresult')->with([
			'curPlayRequest' => $curPlayRequest,
			'yourHand' => $yourHand,
			'aiteHand' => $aiteHand,
			'judge' => $judge
		]);
	}
	
	protected function findByUserId($userId)
	{
		$playScores = PlayScore::all()->where('user_id', $userId);
		if(count($playScores) == 0)
		{
			//  まだ作成していない場合は作成
			$newPlayScore = new PlayScore();
			$newPlayScore->user_id = $userId;
			$newPlayScore->win_count = 0;
			$newPlayScore->lose_count = 0;
			$newPlayScore->save();
			$playScore = $newPlayScore;
		}
		else
		{
			$playScore = $playScores->first();
		}
		return $playScore;
	}

	protected function getHand($handId)
	{
		$handList = [ 1 => 'グー', 2 => 'チョキ', 3 => 'パー' ];
		return $handList[$handId];
	}

	protected function Judge($yourHandId, $aiteHandId)
	{
		$judgeId = ($yourHandId > $aiteHandId) ? $yourHandId - $aiteHandId : $yourHandId - $aiteHandId + 3;
		$judgeList = [ 1 => 'あなたの負け', 2 => 'あなたの勝ち', 3 => 'あいこ' ];
		return $judgeList[$judgeId];
	}
	
	protected function RedirectToError($backTo)
	{
		return view('error')->with([
			'backTo' => $backTo,
			'errorMsg' => "この申請はあなた宛の申請ではありません。",
		]);
	}
}
