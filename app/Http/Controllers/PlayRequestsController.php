<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User;
use Carbon\Carbon;

class PlayRequestsController extends Controller
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

	public function fromYou(Request $httpRequest)
	{
		$httpRequest->session()->put('backTo', '/yourplayrequests');
		$playRequestsFromYou = PlayRequest::all()->where('expired_at', null)->where('from_user_id', Auth::user()->id);
		foreach ($playRequestsFromYou as $playRequest)
		{
			$userPerPlayRequest = User::find($playRequest->to_user_id);
			$playRequest->user_nickname = $userPerPlayRequest->nickname;
		}
		return view('playrequests.yourplayrequests')->with([
			'playRequestsFromYou' => $playRequestsFromYou
		]);
	}

	public function getNew()
	{
		//  ユーザープルダウンは現在ログイン中のユーザーを含まないようにする
		$usersOption = User::all()->where('id', '<>', Auth::user()->id);
		$newPlayRequest = new PlayRequest();
		return view('playrequests.newplayrequest')->with([
			'usersOption' => $usersOption,
			'newPlayRequest' => $newPlayRequest
		]);
	}

	public function postNew(Request $httpRequest)
	{
		$allHttpRequest = $httpRequest->all();
		$curDateTime = new Carbon();
		$newPlayRequest = new PlayRequest();
		$newPlayRequest->from_user_id = Auth::user()->id;
		$newPlayRequest->to_user_id = $allHttpRequest['to_user_id'];
		$newPlayRequest->created_at = $curDateTime;
		$newPlayRequest->updated_at = $curDateTime;
		$newPlayRequest->expired_at = null;
		$newPlayRequest->save();
		return redirect()->to('/menu');
	}

	public function getEdit(Request $httpRequest, $idForEdit)
	{
		$backTo = $httpRequest->session()->get('backTo', '/');
		//  ユーザープルダウンは現在ログイン中のユーザーを含まないようにする
		$usersOption = User::all()->where('id', '<>', Auth::user()->id);
		$curPlayRequest = PlayRequest::find($idForEdit);
		$userOfCurPlayRequest = User::find($curPlayRequest->to_user_id);
		$curPlayRequest->user_nickname = $userOfCurPlayRequest->nickname;

		//  対象の申請があなたの作成した申請でなければ処理を中断してエラーに飛ばす。
		if( $curPlayRequest->from_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($backTo);
		}
		return view('playrequests.editplayrequest')->with([
			'backTo' => $backTo,
			'usersOption' => $usersOption,
			'curPlayRequest' => $curPlayRequest
		]);
	}

	public function postEdit(Request $httpRequest, $idForEdit)
	{
		$allHttpRequest = $httpRequest->all();
		$backTo = $httpRequest->session()->get('backTo', '/');
		$curDateTime = new Carbon();
		$editPlayRequest = PlayRequest::find($idForEdit);

		//  対象の申請があなたの作成した申請でなければ処理を中断してエラーに飛ばす。
		if( $editPlayRequest->from_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($backTo);
		}
		$editPlayRequest->to_user_id = $allHttpRequest['to_user_id'];
		$editPlayRequest->updated_at = $curDateTime;
		$editPlayRequest->save();
		return redirect()->to($backTo);
	}

	public function getDelete(Request $httpRequest, $idForDelete)
	{
		$backTo = $httpRequest->session()->get('backTo', '/');
		$curPlayRequest = PlayRequest::find($idForDelete);
		$userOfCurPlayRequest = User::find($curPlayRequest->to_user_id);
		$curPlayRequest->user_nickname = $userOfCurPlayRequest->nickname;

		//  対象の申請があなたの作成した申請でなければ処理を中断してエラーに飛ばす。
		if( $curPlayRequest->from_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($backTo);
		}
		return view('playrequests.deleteplayrequest')->with([
			'backTo' => $backTo,
			'curPlayRequest' => $curPlayRequest
		]);
	}

	public function postDelete(Request $httpRequest, $idForDelete)
	{
		$deletePlayRequest = PlayRequest::find($idForDelete);
		$backTo = $httpRequest->session()->get('backTo', '/');

		//  対象の申請があなたの作成した申請でなければ処理を中断してエラーに飛ばす。
		if( $deletePlayRequest->from_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($backTo);
		}
		$deletePlayRequest->delete();
		return redirect()->to($backTo);
	}

	protected function RedirectToError($backTo)
	{
		return view('error')->with([
			'backTo' => $backTo,
			'errorMsg' => "この申請はあなたの作成した申請ではありません。",
		]);
	}
}
