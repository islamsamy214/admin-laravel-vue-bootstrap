<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRoundRequest;
use App\Http\Requests\UpdateRoundRequest;
use App\Models\Round;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoundController extends Controller
{
    private $paginate_rounds = 10;

    public function index(Request $request)
    {
        if ($request->search) {
            $rounds = $this->getSearch($request);
        } else {
            $rounds = $this->getRounds();
        }
        return $rounds;
    }
    public function getRounds()
    {
        $rounds = Round::latest()->paginate($this->paginate_rounds);
        return $rounds;
    } //end of getRounds

    public function getSearch($request)
    {
        $rounds = Round::where('name', 'like', '%' . $request->search . '%')->latest()->paginate($this->paginate_rounds)->toArray();
        return $rounds;
    } //end of getSearch

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['teams' => Team::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoundRequest $request)
    {
        DB::beginTransaction();
        try {
            $round = Round::create(['name' => $request->name,]);
            $round->teams()->attach(json_decode($request->team_ids));
            DB::commit();
            return response()->json(__('Round Created Successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(__('Something went wrong'));
        }
    }

    /**
     * Display the specified resource.
     */

    public function edit(Round $round)
    {
        //
        return response()->json(['round' => $round->load('teams'), 'teams' => Team::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoundRequest $request, Round $round)
    {
        DB::beginTransaction();
        try {
            $round->update(['name' => $request->name]);
            $round->teams()->sync(json_decode($request->team_ids));
            DB::commit();
            return response()->json(__('Round Updated Successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(__('Something went wrong'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Round $round)
    {
        $round->teams()->detach();
        $round->delete();
        return response()->json(__('Role Deleted Successfully'));
    }
}
