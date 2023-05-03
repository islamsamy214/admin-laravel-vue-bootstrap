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
        $team = $role->team;
        if ($team !== null) {
            $roundIds = $team->rounds->pluck('id');
            // get the old rate form the pivot table
            $rate = $team->load('rounds')->first()->pivot->rate;
            dd($rate);
            // add the new rate to the old rate
            $rate += $role->round_rate;
            $team->rounds()->updateExistingPivot($roundIds, ['rate' => $rate]);
        }
        return $this->apiSuccessResponse('Role Play updated successfully');
    } // end of update
}
