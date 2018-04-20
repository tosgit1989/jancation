<?php

namespace App\Http\Controllers;

use App\Http\Models\User;

class UsersController extends Controller
{
	public function index()
	{
		$Users = User::all();
		return view('index')->with([
			'users' => $Users
		]);
	}
}
