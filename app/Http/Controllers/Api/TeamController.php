<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Http\Traits\GeneralTrait;

class TeamController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $teams = Team::with(['rounds','users.role'])->get();

        return $this->apiSuccessResponse(['teams' => $teams]);
    } // end of index

    public function show(Team $team)
    {
        return $this->apiSuccessResponse($team->load('users.role'));
    } // end of show

    public function getPresentation(Team $team){
        $presentation = $team->rounds->where('pivot.is_presentation',1)->first();
        return $this->apiSuccessResponse($presentation);
    }
}
