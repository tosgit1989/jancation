<?php

namespace App\Http\Controllers;

use DB;
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

	public function index()
	{
		$PlayRequestsFromYou = DB::table('play_requests')
			->select('play_requests.*', 'users.nickname')
			->leftJoin('users', 'play_requests.to_user_id', '=', 'users.id')
			->where('expired_at', null)
			->where('from_user_id', Auth::user()->id)
			->get();
		return view('playrequests.yourplayrequests')->with([
			'PlayRequestsFromYou' => $PlayRequestsFromYou
		]);
	}

	public function fromYou(Request $HttpRequest)
	{
		$HttpRequest->session()->put('BackTo', '/yourplayrequests');
		$PlayRequestsFromYou = DB::table('play_requests')
			->select('play_requests.*', 'users.nickname')
			->leftJoin('users', 'play_requests.to_user_id', '=', 'users.id')
			->where('expired_at', null)
			->where('from_user_id', Auth::user()->id)
			->get();
		return view('playrequests.yourplayrequests')->with([
			'PlayRequestsFromYou' => $PlayRequestsFromYou
		]);
	}

	public function toYou()
	{
		$PlayRequestsToYou = DB::table('play_requests')
			->select('play_requests.*', 'users.nickname')
			->leftJoin('users', 'play_requests.from_user_id', '=', 'users.id')
			->where('expired_at', null)
			->where('to_user_id', Auth::user()->id)
			->get();
		return view('play.playselect')->with([
			'PlayRequestsToYou' => $PlayRequestsToYou
		]);
	}

	public function getNew()
	{
		//  ユーザープルダウンは現在ログイン中のユーザーを含まないようにする
		$UsersOption = User::all()->where('id', '<>', Auth::user()->id);
		$NewPlayRequest = new PlayRequest();
		return view('playrequests.newplayrequest')->with([
			'UsersOption' => $UsersOption,
			'NewPlayRequest' => $NewPlayRequest
		]);
	}

	public function postNew(Request $HttpRequest)
	{
		$allHttpRequest = $HttpRequest->all();
		$curDateTime = new Carbon();
		$NewPlayRequest = new PlayRequest();
		$NewPlayRequest->from_user_id = Auth::user()->id;
		$NewPlayRequest->to_user_id = $allHttpRequest['to_user_id'];
		$NewPlayRequest->created_at = $curDateTime;
		$NewPlayRequest->updated_at = $curDateTime;
		$NewPlayRequest->expired_at = null;
		$NewPlayRequest->save();
		return redirect()->to('/menu');
	}

	public function getEdit(Request $HttpRequest, $IdForEdit)
	{
		$BackTo = $HttpRequest->session()->get('BackTo', '/');
		//  ユーザープルダウンは現在ログイン中のユーザーを含まないようにする
		$UsersOption = User::all()->where('id', '<>', Auth::user()->id);
		$EditPlayRequest = DB::table('play_requests')
			->select('play_requests.*', 'users.nickname')
			->leftJoin('users', 'play_requests.from_user_id', '=', 'users.id')
			->where('play_requests.id', $IdForEdit)
			->first();
		//  対象の申請があなたの作成した申請でなければ処理を中断してエラーに飛ばす。
		if( $EditPlayRequest->from_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($BackTo);
		}
		return view('playrequests.editplayrequest')->with([
			'BackTo' => $BackTo,
			'UsersOption' => $UsersOption,
			'EditPlayRequest' => $EditPlayRequest
		]);
	}

	public function postEdit(Request $HttpRequest, $IdForEdit)
	{
		$allHttpRequest = $HttpRequest->all();
		$BackTo = $HttpRequest->session()->get('BackTo', '/');
		$curDateTime = new Carbon();
		$EditPlayRequest = DB::table('play_requests')
			->select('play_requests.*', 'users.nickname')
			->leftJoin('users', 'play_requests.from_user_id', '=', 'users.id')
			->where('play_requests.id', $IdForEdit)
			->first();
		//  対象の申請があなたの作成した申請でなければ処理を中断してエラーに飛ばす。
		if( $EditPlayRequest->from_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($BackTo);
		}
		$EditPlayRequest->to_user_id = $allHttpRequest['to_user_id'];
		$EditPlayRequest->updated_at = $curDateTime;
		$EditPlayRequest->save();
		return redirect()->to($BackTo);
	}

	public function getDelete(Request $HttpRequest, $IdForDelete)
	{
		$BackTo = $HttpRequest->session()->get('BackTo', '/');
		$DeletePlayRequest = DB::table('play_requests')
			->select('play_requests.*', 'users.nickname')
			->leftJoin('users', 'play_requests.from_user_id', '=', 'users.id')
			->where('play_requests.id', $IdForDelete)
			->first();
		//  対象の申請があなたの作成した申請でなければ処理を中断してエラーに飛ばす。
		if( $DeletePlayRequest->from_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($BackTo);
		}
		return view('playrequests.deleteplayrequest')->with([
			'BackTo' => $BackTo,
			'DeletePlayRequest' => $DeletePlayRequest
		]);
	}

	public function postDelete(Request $HttpRequest, $IdForDelete)
	{
		$DeletePlayRequest = DB::table('play_requests')
			->select('play_requests.*', 'users.nickname')
			->leftJoin('users', 'play_requests.from_user_id', '=', 'users.id')
			->where('play_requests.id', $IdForDelete)
			->first();
		$BackTo = $HttpRequest->session()->get('BackTo', '/');
		//  対象の申請があなたの作成した申請でなければ処理を中断してエラーに飛ばす。
		if( $DeletePlayRequest->from_user_id !== Auth::user()->id )
		{
			return $this->RedirectToError($BackTo);
		}
		$DeletePlayRequest->delete();
		return redirect()->to($BackTo);
	}

	protected function RedirectToError($BackTo)
	{
		return view('error')->with([
			'BackTo' => $BackTo,
			'ErrorMsg' => "この申請はあなたの作成した申請ではありません。",
		]);
	}
}
