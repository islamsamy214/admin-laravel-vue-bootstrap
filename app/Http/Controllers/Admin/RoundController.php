<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRoundRequest;
use App\Http\Requests\UpdateRoundRequest;
use App\Models\Round;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

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
        $rounds = Round::with('team')->latest()->paginate($this->paginate_rounds);
        return $rounds;
    } //end of getRounds

    public function getSearch($request)
    {
        $rounds = Round::where('name', 'like', '%' . $request->search . '%')->with('team')->latest()->paginate($this->paginate_rounds)->toArray();
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
        Round::create($request->validated());
        return response()->json(__('Round Created Successfully'));
    }

    /**
     * Display the specified resource.
     */

    public function edit(Round $round)
    {
        //
        return response()->json(['round' => $round, 'teams' => Team::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoundRequest $request, Round $round)
    {
        //
        $round->update($request->validated());
        return response()->json(__('Round Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Round $round)
    {
        $round->delete();
        return response()->json(__('Role Deleted Successfully'));
    }
}
