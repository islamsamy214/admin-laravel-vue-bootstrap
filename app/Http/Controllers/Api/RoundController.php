<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Round;
use Illuminate\Http\Request;
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
        $round->update(['team_id' => $request->team_id]);
        $team = Team::findOrFail($request->team_id)->with('roles')->first();
        return $this->apiSuccessResponse(['rolePlays' => $team->roles]);
    } //end of update
}