<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayScore;
use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class SessionController extends Controller
{
    public static function getA(Request $req)
    {
        $aaa = $req->session()->get('key', 'valuv');
        return $aaa;
    }
}
