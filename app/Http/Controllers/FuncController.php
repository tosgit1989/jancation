<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayScore;
use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class FuncController extends Controller
{
	//  ------------------------------------------------------------
    //  共通関数
    //  ------------------------------------------------------------
	public static function getUserBy($id)
    {
        $Users = User::all();
        $nickname = 'undefined';
        foreach ($Users as $User)
        {
            if($id == $User->id)
            {
                $nickname = $User->nickname;
            }
        }
        return $nickname;
    }

    public static function UsersOption()
    {
        $Users = User::all();
        $arr = [];
        foreach($Users as $User)
        {
            $arr[] = [ $User->id => $User->nickname ];
        }
        return $arr;
    }

    public static function Hand($id)
    {
        $arr = [ 1 => 'グー', 2 => 'チョキ', 3 => 'パー' ];
        return $arr[$id];
    }

    public static function Judge($idY, $idA)
    {
        $num1 = ($idY > $idA) ? $idY - $idA : $idY - $idA + 3;
        $arr = [ 1 => 'あなたの負け', 2 => 'あなたの勝ち', 3 => 'あいこ' ];
        return $arr[$num1];
    }
}
