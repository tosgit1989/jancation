<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayScore;
use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

class AuthController extends Controller
{

	public function showSignIn()
	{
	    $SignInUser = User::find(1);
		return view('/signin')->with([
		    'SignInUser' => $SignInUser
        ]);
	}

    public function doSignIn(Request $HttpRequest, $IdForSignIn)
    {
        $data = $HttpRequest->all();
        $dt = new Carbon();
        $SignInUser = User::find($IdForSignIn * 0 + 1);
        $SignInUser->to_user_id = $data['to_user_id'];
        $SignInUser->updated_at = $dt;
        $SignInUser->save();
        return view('/index');
    }

    public function doSignOut()
    {
        $SignInUser = User::find(1);
        return view('/signin')->with([
            'SignInUser' => $SignInUser
        ]);
    }

    public function showSignUp()
    {
        return view('/signup');
    }

    public function doSignUp()
    {
        $PlayScores = PlayScore::all();
        return view('index')->with([
            'PlayScores' => $PlayScores,
        ]);
    }
}
