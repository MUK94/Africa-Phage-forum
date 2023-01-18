<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTeamController extends Controller
{
    public function home()
    {
        $viewData = [];
        $viewData ["title"] = "Admin | Teams - APF Website";
        $viewData ["subtitle"] = "Teams Admin Panel";
        $viewData ["teams"] = Team::all();

        return view('admin.team.home')->with("viewData", $viewData);
    }

    // @1-Create | Store

    public function store(Request $request)
    {
        Team::validate($request);

        $newTeam = new Team();
        $newTeam -> setCountry($request->input('country'));
        $newTeam -> setManagerTitle($request->input('managerTitle'));
        $newTeam -> setManagerName($request->input('managerName'));
        $newTeam -> setManagerInstitution($request->input('managerInstitution'));
        $newTeam -> setStakeholderTitle($request->input('stakeholderTitle'));
        $newTeam -> setStakeholderName($request->input('stakeholderName'));
        $newTeam -> setStakeholderInstitution($request->input('stakeholderInstitution'));
        $newTeam -> setImage('team.png');
        
        $newTeam -> save();

        if ($request->hasFile('image')) {
            $imageName = $newTeam->getId()."_team".".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName, 
                file_get_contents($request->file('image')->getRealPath())
            );

            $newTeam -> setImage($imageName);
            $newTeam -> save();
        }

        return redirect()->route('pages.team');
    }

    // @2-EDIT
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin | Team - APF Website";
        $viewData ["subtitle"] = "Edit Teams";
        $viewData['team'] = Team::findOrFail($id);

        return view('admin.team.edit')->with("viewData", $viewData);
    }

    // @3-UPDATE
    public function update(Request $request, $id)
    {
        Team::validate($request);

        $team = Team::findOrFail($id);
        $team -> setCountry($request->input('country'));
        $team -> setManagerTitle($request->input('managerTitle'));
        $team -> setManagerName($request->input('managerName'));
        $team -> setManagerInstitution($request->input('managerInstitution'));
        $team -> setStakeholderTitle($request->input('stakeholderTitle'));
        $team -> setStakeholderName($request->input('stakeholderName'));
        $team -> setStakeholderInstitution($request->input('stakeholderInstitution'));
        $team -> setImage('team.png');

        if ($request->hasFile('image')) {
            $imageName = $team->getId()."_team".".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName, 
                file_get_contents($request->file('image')->getRealPath())
            );

            $team -> setImage($imageName);
            
        }
        $team -> save();
        return redirect()->route('pages.team');
    }

    // @4-DELETE
    public function delete($id)
    {
        Team::destroy($id);
        return back();
    }
}