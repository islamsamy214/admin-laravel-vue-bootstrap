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
        $team = $role->team;
        // if the team exists and the round exists
        if ($team && $team->rounds->contains($request->round_id)) {
            // check if the team has a presentation
            if ($team->rounds->where('id', $request->round_id)->first()->pivot->is_presentation) {
                $presentation_rate = ($request->opening_rate + $request->probing_rate + $request->delivering_rate + $request->objection_rate + $request->closing_rate + $request->product_rate) / 6;
                $team->rounds()->syncWithoutDetaching([$request->round_id => ['rate' => $presentation_rate, 'opening_rate' => ($request->opening_rate * 10) / 100, 'probing_rate' => ($request->probing_rate * 10) / 100, 'delivering_rate' => ($request->delivering_rate * 10) / 100, 'objection_rate' => ($request->objection_rate * 10) / 100, 'closing_rate' => ($request->closing_rate * 10) / 100, 'product_rate' => ($request->product_rate * 50) / 100]]);
            } else {
                $form_data = [
                    'opening_rate' => ($request->opening_rate * 10) / 100,
                    'probing_rate' => ($request->probing_rate * 10) / 100,
                    'delivering_rate' => ($request->delivering_rate * 10) / 100,
                    'objection_rate' => ($request->objection_rate * 10) / 100,
                    'closing_rate' => ($request->closing_rate * 10) / 100,
                    'product_rate' => ($request->product_rate * 50) / 100,
                ];
                $role->update($form_data);
                $team->rounds()->syncWithoutDetaching([$request->round_id => ['rate' => $team->round_rate, 'role_rates' => $team->roles->pluck('round_rate')]]);
            }
        } else {
            return $this->notFound();
        }
        return $this->apiSuccessResponse('Role Play updated successfully');
    } // end of update
}
