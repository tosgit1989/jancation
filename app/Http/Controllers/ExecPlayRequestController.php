<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayRequest;
use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\FuncController;
use App\Http\Requests;
use Carbon\Carbon;

class ExecPlayRequestController extends Controller
{
	public function getNew()
	{
		$curUser = User::find(1);
		$UsersOption = FuncController::UsersOption();
		$NewPlayRequest = new PlayRequest();
		return view('playrequest.newplayrequest')->with([
			'curUser' => $curUser,
			'UsersOption' => $UsersOption,
			'NewPlayRequest' => $NewPlayRequest
		]);
	}

	public function postNew(Request $HttpRequest)
	{
		$curUser = User::find(1);
		$allHttpRequest = $HttpRequest->all();
		$curDateTime = new Carbon();
		$NewPlayRequest = new PlayRequest();
		$NewPlayRequest->from_user_id = $curUser->id;
		$NewPlayRequest->to_user_id = $allHttpRequest['to_user_id'];
		$NewPlayRequest->created_at = $curDateTime;
		$NewPlayRequest->updated_at = $curDateTime;
        $NewPlayRequest->expired_at = null;
		$NewPlayRequest->save();
		return redirect()->to('/');
	}

	public function getEdit($IdForEdit)
	{
		$curUser = User::find(1);
		$UsersOption = FuncController::UsersOption();
		$EditPlayRequest = PlayRequest::find($IdForEdit);
		return view('playrequest.editplayrequest')->with([
			'curUser' => $curUser,
			'UsersOption' => $UsersOption,
			'EditPlayRequest' => $EditPlayRequest
		]);
	}

	public function postEdit(Request $HttpRequest, $IdForEdit)
	{
		$curUser = User::find(1);
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
		$curUser = User::find(1);
		$DeletePlayRequest = PlayRequest::find($IdForDelete);
		return view('playrequest.deleteplayrequest')->with([
			'curUser' => $curUser,
			'DeletePlayRequest' => $DeletePlayRequest
		]);
	}

	public function postDelete($IdForDelete)
	{
		$curUser = User::find(1);
		$DeletePlayRequest = PlayRequest::find($IdForDelete);
		$DeletePlayRequest->delete();
		return redirect()->to('/');
	}
}
