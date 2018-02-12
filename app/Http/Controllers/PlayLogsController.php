<?php

namespace App\Http\Controllers;

use App\Http\Models\PlayLog;
use Illuminate\Http\Request;
use App\Http\Requests;

class PlayLogsController extends Controller
{

    public function index()
    {
        $PlayLogs = PlayLog::all();
        return view('index')->with([
            'PlayLogs' => $PlayLogs
        ]);
    }
}
