<?php

namespace App\Http\Controllers;

use App\Models\CallHistory;

class CallHistoryController extends Controller
{
    public function index()
    {
        $callHistories = CallHistory::all();
        return view('call-history.index', compact('callHistories'));
    }
}
