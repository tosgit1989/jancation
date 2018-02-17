<?php

use Illuminate\Http\Request,

class SessionHandler() {
	public static function getUserId(Request $request)
	{
		 return $request->session()->get('id');
	}

}

