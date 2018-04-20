<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
	public static function getA(Request $req)
	{
		$aaa = $req->session()->get('key', 'valuv');
		return $aaa;
	}
}
