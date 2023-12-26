<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
class ClubController extends Controller
{
    public function index(Request $request)
    {
        $allClubs = Club::all();

        // Get unique club names
        $uniqueClubNames = $allClubs->unique('clubname')->pluck('clubname', 'id');

        // Check if there is a filter in the request
        if ($request->has('filter')) {
            $filteredClub = Club::find($request->input('filter'));

            // If the filtered club is found, display only that club
            if ($filteredClub) {
                $clubs = Club::where('clubname', $filteredClub->clubname)->get();
            } else {
                // If the filtered club is not found, display all clubs
                $clubs = $allClubs;
            }
        } else {
            // If there is no filter, display all clubs
            $clubs = $allClubs;
        }

        return view('clubs.index', ['clubs' => $clubs, 'allClubs' => $uniqueClubNames]);
    }


    public function create() {
        return view('clubs.create');
    }

    
    public function store(Request $request) {
        $data = $request->validate([
            'clubname' => 'required',
            'description' => 'nullable',
            'president' => 'required',
        ]);

        $newClub = Club::create($data);
        return redirect(route('clubs.index'));
    }


    public function edit(Club $club) {
        return view('clubs.edit', ['club'=> $club]);
    }

    public function update(Request $request, Club $club) {
        $data = $request->validate([
            'clubname' => 'required',
            'description' => 'nullable',
            'president' => 'required',
        ]);

        $club ->update($data);

        return redirect(route('clubs.index'))->with('success', 'Club Updated Sucessfully');
    }


    public function destroy(Club $club) {
        $club->delete();
        return redirect(route('clubs.index'))->with('success','Club has been deleted');
    }

    
}
