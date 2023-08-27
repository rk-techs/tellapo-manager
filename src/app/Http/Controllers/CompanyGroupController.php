<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyGroupRequest;
use App\Models\Company;
use App\Models\CompanyGroup;

class CompanyGroupController extends Controller
{
    public function index()
    {
        $companyGroups = CompanyGroup::withCount('companies')->get();
        $unassignedCompaniesCount = Company::whereNull('company_group_id')->count();

        return view('company-groups.index', compact('companyGroups', 'unassignedCompaniesCount'));
    }

    public function create()
    {
        return view('company-groups.create');
    }

    public function store(StoreCompanyGroupRequest $request)
    {
        $companyGroup = CompanyGroup::create([
            'name' => $request->input('name'),
        ]);

        return redirect()
            ->route('company-groups.index')
            ->with([
                'action'  => 'success',
                'message' => "ID:{$companyGroup->id}を登録しました。"
            ]);
    }
}
