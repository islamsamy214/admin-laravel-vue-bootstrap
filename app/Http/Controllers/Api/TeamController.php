<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Http\Traits\GeneralTrait;
use App\Http\Requests\Api\PresentationRequest;

class TeamController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $teams = Team::with(['rounds', 'users.role'])->get();

        return $this->apiSuccessResponse(['teams' => $teams]);
    } // end of index

    public function show(Team $team)
    {
        return $this->apiSuccessResponse($team->load('users.role'));
    } // end of show

    public function getPresentation(Team $team)
    {
        $presentation = $team->rounds()->wherePivot('is_presentation', true)->first();
        
        // Make sure we retrieve an object before continuing
        if ($presentation) {
            // Create a new presentation object with all properties of the original presentation object
            $extendedPresentation = clone $presentation;
        
            // Add the team property to the extended presentation object
            $extendedPresentation->team = $team;
        
            // Use the extended presentation object from now on.
            $presentation = $extendedPresentation;
        }
        
        return $this->apiSuccessResponse($presentation);
    }

    public function updatePresentation(Team $team, PresentationRequest $request)
    {
        $presentation = $team->rounds->where('pivot.is_presentation', 1)->first();
        $presentation_rate =
            ((($request->opening_rate * 10) / 100)
            + (($request->probing_rate * 10) / 100)
            + (($request->delivering_rate * 10) / 100)
            + (($request->objection_rate * 10) / 100)
            + (($request->closing_rate * 10) / 100)
            + (($request->product_rate * 50) / 100))/6;
        $form_data = [
            'rate' => $presentation_rate,
            'opening_rate' => ($request->opening_rate * 10) / 100,
            'probing_rate' => ($request->probing_rate * 10) / 100,
            'delivering_rate' => ($request->delivering_rate * 10) / 100,
            'objection_rate' => ($request->objection_rate * 10) / 100,
            'closing_rate' => ($request->closing_rate * 10) / 100,
            'product_rate' => ($request->product_rate * 50) / 100
        ];
        $presentation->pivot->update($form_data);
        $presentation = $team->rounds()->wherePivot('is_presentation', true)->first();
        
        // Make sure we retrieve an object before continuing
        if ($presentation) {
            // Create a new presentation object with all properties of the original presentation object
            $extendedPresentation = clone $presentation;
        
            // Add the team property to the extended presentation object
            $extendedPresentation->team = $team;
        
            // Use the extended presentation object from now on.
            $presentation = $extendedPresentation;
        }
        return $this->apiSuccessResponse($presentation);
    }
}
