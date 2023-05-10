<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    use ImageTrait;

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
        $teams = Team::withCount('roles')->withCount('users')->latest()->paginate($this->paginate_teams);
        return $teams;
    } //end of getTeams

    public function getSearch($request)
    {
        $teams = Team::where('name', 'like', '%' . $request->search . '%')->withCount('roles')->withCount('users')->latest()->paginate($this->paginate_teams)->toArray();
        return $teams;
    } //end of getSearch

    /**
     * Show the form for creating a new resource.
     */

    public function store(StoreTeamRequest $request)
    {
        $form_data = $request->validated();

        //image uploading
        $request->image ? $form_data['image'] = $this->img($request->image, 'images/teams/') : '';

        Team::create($form_data);
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
        $form_data = $request->except('image');

        //image uploading
        if ($request->image) {
            $team->image ? $this->deleteImg($team->image) : '';
            $form_data['image'] = $this->img($request->image, 'images/teams/');
        } else {
            $form_data['image'] = $team->image;
        }

        $team->update($form_data);
        return response()->json(__('Team Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team, Request $request)
    {
        DB::beginTransaction();
        try {
            $team->rounds()->detach();
            $team->roles()->delete();
            $team->users()->delete();
            // delete image
            if ($team->image && $team->image != 'images/default.jpg') {
                $this->deleteImg($team->image);
            }
            $team->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error']);
        }
        return response()->json(__('Team Deleted Successfully'));
    }
}
