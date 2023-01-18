<?php
namespace App\Http\Controllers\Admin;

use App\Models\AboutSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAboutSectionController extends Controller
{
    public function home()
    {
        $viewData = [];
        $viewData["title"] = "APF | About Section Admin";
        $viewData["subtitle"] = "About Section Page Admin";
        $viewData["about_sections"] = AboutSection::all();

        return view('admin.aboutSection.home')->with("viewData", $viewData);

    }

    // @CRUD OPERATIONS
    // 1-CREATE OR STORE
    public function store(Request $request)
    {
        AboutSection::validate($request);

        $newAboutSection = new AboutSection();
        $newAboutSection -> setDescription($request->input('description'));
        $newAboutSection -> setDetails($request->input('details'));
        $newAboutSection -> setImage('about_Section.png');
        $newAboutSection -> save();

        if ($request->hasFile('image')) {
            $imageName = $newAboutSection->getId()."_aboutSection".".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName, 
                file_get_contents($request->file('image')->getRealPath())
            );

            $newAboutSection -> setImage($imageName);
            $newAboutSection -> save();
        }

        return redirect()->route('pages.about');
    }

    // @ 2-EDIT
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin | About - APF Website";
        $viewData ["subtitle"] = "Edit About Section Page";
        $viewData["aboutSection"] = AboutSection::findOrFail($id);

        return view('admin.aboutSection.edit')->with("viewData", $viewData);
    }

    // @ 3-UPDATE
    public function update(Request $request, $id)
    {
        AboutSection::validate($request);

        $aboutSection = AboutSection::findOrFail($id);
        $aboutSection -> setDescription($request->input('description'));
        $aboutSection -> setDetails($request->input('details'));
        $aboutSection -> setImage('aboutSection.jpg');

        if ($request->hasFile('image')) {
            $imageName = $aboutSection->getId()."_aboutSection".".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName, 
                file_get_contents($request->file('image')->getRealPath())
            );

            $aboutSection -> setImage($imageName);
        }
        $aboutSection -> save();

        return redirect()->route('pages.about');
    }

    // @ 4-DELETE
    public function delete($id)
    {
        AboutSection::destroy($id);
        return back();
    }
}