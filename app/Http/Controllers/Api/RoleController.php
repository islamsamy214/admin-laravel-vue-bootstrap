<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateRoleRequest;
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
        $role->team->load('rounds');
        $role->load('users');
        return $this->apiSuccessResponse(['role' => $role]);
    } // end of show

    /**
     * Handle the incoming request.
     */

    public function update(Role $role, UpdateRoleRequest $request)
    {
        $role->update($request->validated());
        $team = $role->team;
        // if the team exists and the round exists
        if ($team && $team->rounds->contains($request->round_id)) {
            $team->rounds()->syncWithoutDetaching([$request->round_id => ['rate' => $team->round_rate, 'role_rates' => $team->roles->pluck('round_rate')]]);
        }else{
            return $this->notFound();
        }
        return $this->apiSuccessResponse('Role Play updated successfully');
    } // end of update
}
