<?php

namespace App\Http\Controllers;

use App\Enums\CallHistoryResult;
use App\Http\Requests\StoreCallRequest;
use App\Models\Call;
use App\Models\Company;

class CallController extends Controller
{
    public function index()
    {
        $calls = Call::all();
        return view('call-history.index', compact('calls'));
    }

    public function create(Company $company)
    {
        $resultLabels = CallHistoryResult::labels();

        return view('call-history.create', compact('company', 'resultLabels'));
    }

    public function store(StoreCallRequest $request, Company $company)
    {
        Call::create([
            'company_id'    => $company->id,
            'employee_id'   => Auth()->user()->employee->id,
            'called_at'     => now(),
            'result'        => $request->input('result'),
            'notes'         => $request->input('notes'),
        ]);

        return redirect()->route('company.index');
    }
}
