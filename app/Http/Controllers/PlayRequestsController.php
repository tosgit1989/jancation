<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FuncController;
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
		$PlayRequests = PlayRequest::all()->where('expired_at', null)->where('to_user_id', Auth::user()->id);
		return view('playrequests.yourplayrequests')->with([
			'PlayRequests' => $PlayRequests
		]);
	}

	public function fromYou(Request $request)
	{
		$request->session()->put('BackTo', '/yourplayrequests');
		$PlayRequestsFromYou = PlayRequest::all()->where('expired_at', null)->where('from_user_id', Auth::user()->id);
		return view('playrequests.yourplayrequests')->with([
			'PlayRequestsFromYou' => $PlayRequestsFromYou
		]);
	}

	public function toYou()
	{
		$PlayRequestsToYou = PlayRequest::all()->where('expired_at', null)->where('to_user_id', Auth::user()->id);
		return view('play.playselect')->with([
			'PlayRequestsToYou' => $PlayRequestsToYou
		]);
	}

	public function getNew()
	{
		$UsersOption = FuncController::UsersOption();
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
		return redirect()->to('/');
	}

	public function getEdit(Request $request, $IdForEdit)
	{
		$BackTo = $request->session()->get('BackTo', '/');
		$UsersOption = FuncController::UsersOption();
		$EditPlayRequest = PlayRequest::find($IdForEdit);
		return view('playrequests.editplayrequest')->with([
			'BackTo' => $BackTo,
			'UsersOption' => $UsersOption,
			'EditPlayRequest' => $EditPlayRequest
		]);
	}

	public function postEdit(Request $HttpRequest, $IdForEdit)
	{
		$allHttpRequest = $HttpRequest->all();
		$curDateTime = new Carbon();
		$EditPlayRequest = PlayRequest::find($IdForEdit);
		$EditPlayRequest->to_user_id = $allHttpRequest['to_user_id'];
		$EditPlayRequest->updated_at = $curDateTime;
		$EditPlayRequest->save();
		return redirect()->to('/');
	}

	public function getDelete(Request $request, $IdForDelete)
	{
		$BackTo = $request->session()->get('BackTo', '/');
		$DeletePlayRequest = PlayRequest::find($IdForDelete);
		return view('playrequests.deleteplayrequest')->with([
			'BackTo' => $BackTo,
			'DeletePlayRequest' => $DeletePlayRequest
		]);
	}

	public function postDelete($IdForDelete)
	{
		$DeletePlayRequest = PlayRequest::find($IdForDelete);
		$DeletePlayRequest->delete();
		return redirect()->to('/');
	}
}
