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
        $teams = Team::with('round', 'roles.users')->get();
        return $this->apiSuccessResponse(['teams' => $teams]);
    } // end of index

    public function show(Team $team)
    {
        return $this->apiSuccessResponse($team->roles->load('users'));
    } // end of show
}
