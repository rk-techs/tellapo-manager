<?php

namespace App\Http\Controllers;

use App\Enums\CallHistoryResult;
use App\Http\Requests\StoreCallHistoryRequest;
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

    public function store(StoreCallHistoryRequest $request, Company $company)
    {
        CallHistory::create([
            'company_id'    => $company->id,
            'employee_id'   => Auth()->user()->employee->id,
            'called_at'     => now(),
            'result'        => $request->input('result'),
            'notes'         => $request->input('notes'),
        ]);

        return redirect()->route('company.index');
    }
}
