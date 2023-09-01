<?php

namespace App\Http\Controllers;

use App\Enums\CallResult;
use App\Http\Requests\SearchCallRequest;
use App\Http\Requests\StoreCallRequest;
use App\Http\Requests\UpdateCallRequest;
use App\Models\Call;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class CallController extends Controller
{
    public function index(SearchCallRequest $request)
    {
        $callsQuery = Call::query()
            ->searchByEmployeeId($request->get('employee_id'))
            ->searchByResult($request->get('result'))
            ->searchByKeyword($request->get('keyword'))
            ->orderByField($request->get('sortField'), $request->get('sortType'));

        // for Search field
        $employeeIds        = Call::pluck('employee_id')->unique();
        $employeeSelectors  = Employee::whereIn('id', $employeeIds)->get();
        $resultLabels = CallResult::labels();

        $count = $callsQuery->count();
        $calls = $callsQuery->simplePaginate(100)->withQueryString();

        return view('call.index', compact('calls', 'count', 'employeeSelectors', 'resultLabels'));
    }

    public function showByCompany(Company $company)
    {
        // for Search field
        $employeeIds        = Call::pluck('employee_id')->unique();
        $employeeSelectors  = Employee::whereIn('id', $employeeIds)->get();
        $resultLabels = CallResult::labels();

        $calls = $company->calls()->orderBy('called_at', 'DESC')->get();
        return view('call.index', compact('calls','employeeSelectors', 'resultLabels'));
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

        return redirect()
            ->route('companies.index', $queryParams)
            ->with([
                'action'  => 'success',
                'message' => "ID:{$company->id} {$company->name}にTELしました。"
            ]);
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
