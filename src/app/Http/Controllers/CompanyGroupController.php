<?php

namespace App\Http\Controllers;

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
}
