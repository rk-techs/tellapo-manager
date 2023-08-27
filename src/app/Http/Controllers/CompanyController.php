<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\CompanyGroup;
use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    public function index(SearchCompanyRequest $request)
    {
        $companiesQuery = Company::query()
            ->withCount('calls')
            ->searchById($request->get('id'))
            ->searchByKeyword($request->get('keyword'))
            ->searchByDateRange(
                $request->get('keyDate'),
                $request->get('startDate'),
                $request->get('endDate')
            )
            ->searchByEmployeeId($request->get('employee_id'))
            ->orderByField($request->get('sortField'), $request->get('sortType'));

        // for Search field
        $employeeIds        = Company::pluck('employee_id')->unique();
        $employeeSelectors  = Employee::whereIn('id', $employeeIds)->get();

        $count     = $companiesQuery->count();
        $companies = $companiesQuery->simplePaginate(50)->withQueryString();

        return view('company.index', compact('companies', 'count', 'employeeSelectors'));
    }

    public function create()
    {
        $employees = Employee::all();
        $companyGroups = CompanyGroup::all();
        return view('company.create', compact('employees', 'companyGroups'));
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create([
            'name'          => $request->input('name'),
            'postal_code'   => $request->input('postal_code'),
            'address'       => $request->input('address'),
            'tel'           => $request->input('tel'),
            'fax'           => $request->input('fax'),
            'email'         => $request->input('email'),
            'website'       => $request->input('website'),
            'industry'      => $request->input('industry'),
            'capital'       => $request->input('capital'),
            'number_of_employees'   => $request->input('number_of_employees'),
            'annual_sales'          => $request->input('annual_sales'),
            'listed'                => $request->input('listed'),
            'established_at'        => $request->input('established_at'),
            'corporate_number'      => $request->input('corporate_number'),
            'prospect_rating'       => $request->input('prospect_rating'),
            'employee_id'           => $request->input('employee_id'),
        ]);

        return redirect()
            ->route('companies.index')
            ->with([
                'action'  => 'success',
                'message' => "ID:{$company->id}を登録しました。"
            ]);
    }

    public function edit(string $id)
    {
        try {
            $company = Company::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in CompnayController');
            return redirect()
                ->route('companies.index')
                ->with(['action' => 'error', 'message' => 'Compnay not found...']);
        }

        $employees = Employee::all();
        $companyGroups = CompanyGroup::all();

        return view('company.edit', compact('company', 'employees', 'companyGroups'));
    }

    public function update(UpdateCompanyRequest $request, string $id)
    {
        try {
            $company = Company::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in CompnayController');
            return redirect()
                ->route('companies.index')
                ->with(['action' => 'error', 'message' => 'Compnay not found...']);
        }

        $company->update([
            'name'          => $request->input('name'),
            'postal_code'   => $request->input('postal_code'),
            'address'       => $request->input('address'),
            'tel'           => $request->input('tel'),
            'fax'           => $request->input('fax'),
            'email'         => $request->input('email'),
            'website'       => $request->input('website'),
            'industry'      => $request->input('industry'),
            'capital'       => $request->input('capital'),
            'number_of_employees'   => $request->input('number_of_employees'),
            'annual_sales'          => $request->input('annual_sales'),
            'listed'                => $request->input('listed'),
            'established_at'        => $request->input('established_at'),
            'corporate_number'      => $request->input('corporate_number'),
            'prospect_rating'       => $request->input('prospect_rating'),
            'employee_id'           => $request->input('employee_id'),
        ]);

        return redirect()
            ->route('companies.index')
            ->with([
                'action'  => 'success',
                'message' => "ID:{$company->id}を更新しました。"
            ]);
    }

    public function destroy(string $id)
    {
        try {
            $company = Company::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in CompnayController');
            return redirect()
                ->route('companies.index')
                ->with(['action' => 'error', 'message' => 'Compnay not found...']);
        }

        if ($company->calls()->exists()) {
            return redirect()
                ->route('companies.edit', ['id' => $company->id])
                ->with(['action' => 'error', 'message' => 'TEL履歴が存在するため削除できません']);
        }

        $company->delete();

        return redirect()
            ->route('companies.index')
            ->with([
                'action'  => 'deleted',
                'message' => "ID:{$company->id}を削除しました。"
            ]);
    }
}
