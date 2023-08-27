<?php

namespace App\Http\Controllers;

use App\Models\CompanyGroup;

class CompanyGroupController extends Controller
{
    public function index()
    {
        $companyGroups = CompanyGroup::all();
        return view('company-groups.index', compact('companyGroups'));
    }
}
