<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Employee;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchUserRequest $request)
    {
        $usersQuery = User::query()
            ->searchById($request->get('id'))
            ->searchByKeyword($request->get('keyword'))
            ->orderByField($request->get('sortField'), $request->get('sortType'));

        $count = $usersQuery->count();
        $users = $usersQuery->simplePaginate(50)->withQueryString();

        return view('user.index', ['users' => $users, 'count' => $count]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create', [
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $inputs = $request->all();

        $user = User::create([
            'permission_id' => $inputs['permission_id'],
            'name'          => $inputs['name'],
            'email'         => $inputs['email'],
            'password'      => Hash::make($inputs['password']),
        ]);

        Employee::create([
            'user_id'       => $user->id,
            'mobile_number' => $inputs['mobile_number'],
            'remark'        => $inputs['remark'],
        ]);

        return redirect()
            ->route('user.index')
            ->with([
                'action'  => 'success',
                'message' => "ID:{$user->id}を登録しました。"
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in UserController');
            return redirect()
                ->route('user.index')
                ->with(['action' => 'error', 'message' => 'User not found...']);
        }

        return view('user.edit', [
            'permissions' => Permission::all(),
            'user'        => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $inputs = $request->all();
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in UserController');
            return redirect()
                ->route('user.index')
                ->with(['action' => 'error', 'message' => 'User not found...']);
        }

        $user->update([
            'permission_id' => $inputs['permission_id'],
            'name'          => $inputs['name'],
            'email'         => $inputs['email'],
        ]);

        if ($inputs['password']) {
            $user->update(['password' => $inputs['password']]);
        }

        $user->employee->update([
            'user_id'       => $user->id,
            'mobile_number' => $inputs['mobile_number'],
            'remark'        => $inputs['remark'],
        ]);

        return redirect()
            ->route('user.index')
            ->with([
                'action'  => 'success',
                'message' => "ID:{$user->id}を更新しました。"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . ' in UserController');
            return redirect()
                ->route('user.index')
                ->with(['action' => 'error', 'message' => 'User not found...']);
        }

        $user->employee->delete();
        $user->delete();

        return redirect()
            ->route('user.index')
            ->with([
                'action'  => 'deleted',
                'message' => "ID:{$user->id}を削除しました。"
            ]);
    }
}
