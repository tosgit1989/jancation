<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;

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
