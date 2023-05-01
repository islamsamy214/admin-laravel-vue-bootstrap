<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    private $paginate_roles = 10;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $roles = $this->getSearch($request);
        } else {
            $roles = $this->getRoles();
        }
        return $roles;
    }
    public function getRoles()
    {
        $roles = Role::with('team')->withCount('users')->latest()->paginate($this->paginate_roles);
        return $roles;
    } //end of getUsers

    public function getSearch($request)
    {
        $roles = Role::where('name', 'like', '%' . $request->name . '%')->with('team')->withCount('users')->latest()->paginate($this->paginate_roles)->toArray();
        return $roles;
    } //end of getSearch

    /**
     * creating a new resource.
     */

    public function create()
    {
        return response()->json(['teams' => Team::all()]);
    } //end of create

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated());
        return response()->json(__('Role Created Successfully'));
    }

    /**
     * Display the specified resource.
     */

    public function edit(Role $role)
    {
        return response()->json(['role' => $role, 'teams' => Team::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return response()->json(__('Role Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        DB::beginTransaction();
        try {
            $role->users()->delete();
            $role->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
        return response()->json(__('Role Deleted Successfully'));
    }
}
