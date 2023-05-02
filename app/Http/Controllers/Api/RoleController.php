<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateRoleRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Traits\GeneralTrait;

class RoleController extends Controller
{
    use GeneralTrait;

    /**
     * Handle the incoming request.
     */

    public function show(Role $role)
    {
        $role->load('team');
        $role->team->load('round');
        $role->load('users');
        return $this->apiSuccessResponse(['rolePlay' => $role]);
    } // end of show

    /**
     * Handle the incoming request.
     */

    public function update(Role $role, UpdateRoleRequest $request)
    {
        $role->update($request->validated());
        return $this->apiSuccessResponse('Role Play updated successfully');
    } // end of update
}
