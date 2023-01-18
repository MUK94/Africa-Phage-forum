<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller 
{
    public function profile()
    {
        $viewData = [];
        $viewData["title"] = "Settings | APF Website";
        $viewData["subtitle"] = "User dashboard";
        return view('pages.profile')->with("viewData", $viewData);
    }
    // @EDIT
    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = "User Dashboard | APF";
        $viewData['subtitle'] = "Update your profile";
        $viewData['user'] = User::findOrFail($id);

        return view('user.profile.edit')->with('viewData', $viewData);

    }

    // @UPDATE
    public function update(Request $request, $id)
    {
        // User::validate($request);
        
        $user = User::findOrFail($id);
        $user -> setName($request->input('name'));
        $user -> setEmail($request->input('email'));
        $user -> setExperience($request->input('experience'));
        $user -> setLaboratory($request->input('laboratory'));
        $user -> setImage('user.png');

        if ($request->hasFile('image')) {
            $imageName = $user->getId()."_user".".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image'))
            );
            $user->setImage($imageName);
        }
        $user->save();

        return redirect()->route('pages.profile');
    }

    // @DELETE
    public function delete($id)
    {
        User::destroy($id);
        return back();
    }
}