<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\FuncController;
use App\Http\Requests;
use Carbon\Carbon;

class ExecPlayRequestController extends Controller
{
	public function getNew()
	{
		$UsersOption = FuncController::UsersOption();
		$NewPlayRequest = new PlayRequest();
		return view('playrequest.newplayrequest')->with([
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

	public function getEdit($IdForEdit)
	{
		$UsersOption = FuncController::UsersOption();
		$EditPlayRequest = PlayRequest::find($IdForEdit);
		return view('playrequest.editplayrequest')->with([
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

	public function getDelete($IdForDelete)
	{
		$DeletePlayRequest = PlayRequest::find($IdForDelete);
		return view('playrequest.deleteplayrequest')->with([
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
