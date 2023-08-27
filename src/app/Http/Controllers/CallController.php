<?php

namespace App\Http\Controllers;

use App\Enums\CallResult;
use App\Http\Requests\StoreCallRequest;
use App\Models\Call;
use App\Models\Company;

class CallController extends Controller
{
    public function index()
    {
        $calls = Call::orderBy('called_at', 'DESC')->get();
        return view('call.index', compact('calls'));
    }

    public function create(Company $company)
    {
        $resultLabels = CallResult::labels();

        return view('call.create', compact('company', 'resultLabels'));
    }

    public function store(StoreCallRequest $request, Company $company)
    {
        Call::create([
            'company_id'    => $company->id,
            'employee_id'   => Auth()->user()->employee->id,
            'called_at'     => now(),
            'result'        => $request->input('result'),
            'receiver_info' => $request->input('receiver_info'),
            'notes'         => $request->input('notes'),
        ]);

        return redirect()->route('companies.index');
    }
}
