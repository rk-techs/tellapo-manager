<?php

namespace App\Http\Controllers;

use App\Enums\CallResult;
use App\Http\Requests\StoreCallRequest;
use App\Http\Requests\UpdateCallRequest;
use App\Models\Call;
use App\Models\Company;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

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

        $queryParams = session('previous_query_params', []);

        return redirect()->route('companies.index', $queryParams);
    }

    public function edit(Company $company, string $id)
    {
        try {
            $call = Call::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in CallController');
            return redirect()
                ->route('calls.index')
                ->with(['action' => 'error', 'message' => 'Calls not found...']);
        }

        $resultLabels = CallResult::labels();

        return view('call.edit', compact('call', 'company', 'resultLabels'));
    }

    public function update(UpdateCallRequest $request, string $id)
    {
        try {
            $call = Call::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in CallController');
            return redirect()
                ->route('calls.index')
                ->with(['action' => 'error', 'message' => 'Calls not found...']);
        }

        $call->update([
            'result'        => $request->input('result'),
            'receiver_info' => $request->input('receiver_info'),
            'notes'         => $request->input('notes'),
        ]);

        return redirect()
            ->route('calls.index')
            ->with([
                'action'  => 'success',
                'message' => "ID:{$call->id}を更新しました。"
            ]);
    }

    public function destroy(string $id)
    {
        try {
            $call = Call::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in CallController');
            return redirect()
                ->route('calls.index')
                ->with(['action' => 'error', 'message' => 'Calls not found...']);
        }

        $call->delete();

        return redirect()
            ->route('calls.index')
            ->with([
                'action'  => 'deleted',
                'message' => "ID:{$call->id}を削除しました。"
            ]);
    }
}
