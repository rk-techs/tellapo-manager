<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyGroupRequest;
use App\Http\Requests\UpdateCompanyGroupRequest;
use App\Models\Company;
use App\Models\CompanyGroup;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

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

    public function edit(string $id)
    {
        try {
            $companyGroup = CompanyGroup::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in CompanyGroupController');
            return redirect()
                ->route('company-groups.index')
                ->with(['action' => 'error', 'message' => 'CompanyGroup not found...']);
        }

        return view('company-groups.edit', compact('companyGroup'));
    }

    public function update(UpdateCompanyGroupRequest $request, string $id)
    {
        try {
            $companyGroup = CompanyGroup::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in CompanyGroupController');
            return redirect()
                ->route('company-groups.index')
                ->with(['action' => 'error', 'message' => 'CompanyGroup not found...']);
        }

        $companyGroup->update([
            'name' => $request->input('name'),
        ]);

        return redirect()
        ->route('company-groups.index')
        ->with([
            'action'  => 'success',
            'message' => "ID:{$companyGroup->id}を更新しました。"
        ]);
    }

    public function destroy(string $id)
    {
        try {
            $companyGroup = CompanyGroup::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in CompanyGroupController');
            return redirect()
                ->route('company-groups.index')
                ->with(['action' => 'error', 'message' => 'CompanyGroup not found...']);
        }

        $companyGroup->delete();

        return redirect()
        ->route('company-groups.index')
        ->with([
            'action'  => 'deleted',
            'message' => "ID:{$companyGroup->id}を削除しました。"
        ]);
    }
}
