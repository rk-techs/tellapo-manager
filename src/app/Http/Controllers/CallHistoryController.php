<?php

namespace App\Http\Controllers;

use App\Enums\CallHistoryResult;
use App\Models\CallHistory;
use App\Models\Company;

class CallHistoryController extends Controller
{
    public function index()
    {
        $callHistories = CallHistory::all();
        return view('call-history.index', compact('callHistories'));
    }

    public function create(Company $company)
    {
        $resultLabels = CallHistoryResult::labels();

        return view('call-history.create', compact('company', 'resultLabels'));
    }
}
