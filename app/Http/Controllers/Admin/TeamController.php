<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Role;
use App\Models\Round;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    private $paginate_teams = 10;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $teams = $this->getSearch($request);
        } else {
            $teams = $this->getTeams();
        }
        return $teams;
    }
    public function getTeams()
    {
        $teams = Team::latest()->paginate($this->paginate_teams);
        return $teams;
    } //end of getUsers

    public function getSearch($request)
    {
        $teams = Team::where('name', 'like', '%' . $request->name . '%')->latest()->paginate($this->paginate_teams)->toArray();
        return $teams;
    } //end of getSearch

    /**
     * Show the form for creating a new resource.
     */

    public function store(StoreTeamRequest $request)
    {
        Team::create($request->validated());
        return response()->json(__('Team Created Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function edit(Team $team)
    {
        return $team;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update($request->validated());
        return response()->json(__('Team Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->round()->delete();
        $team->roles()->delete();
        $team->delete();
        return response()->json(__('Team Deleted Successfully'));
    }
}
