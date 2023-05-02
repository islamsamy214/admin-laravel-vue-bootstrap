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
        return $this->apiSuccessResponse('teams', Team::with('users', 'roles')->get());
    } // end of index

    public function show(Team $team)
    {
        return $this->apiSuccessResponse($team->load('users', 'roles'));
    } // end of show
}
