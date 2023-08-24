<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('company.create', compact('employees'));
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
            ->route('company.index')
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
                ->route('company.index')
                ->with(['action' => 'error', 'message' => 'Compnay not found...']);
        }

        $employees = Employee::all();

        return view('company.edit', compact('company', 'employees'));
    }
}
