<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Round;
use App\Http\Requests\Api\UpdateRoundRequest;
use App\Models\Team;

class RoundController extends Controller
{
    use GeneralTrait;

    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return $this->apiSuccessResponse(['rounds' => Round::all()]);
    } //end of index

    /**
     * Handle the incoming request.
     */
    public function update(Round $round, UpdateRoundRequest $request)
    {
        // attach team to round if not exist
        $round->teams()->syncWithoutDetaching([$request->team_id => ['is_presentation' => $request->is_presentation]]);
        $team = Team::with('roles')->findOrFail($request->team_id);
        dd($team);
        return $this->apiSuccessResponse(['roles' => $team->roles]);
    } //end of update
}
