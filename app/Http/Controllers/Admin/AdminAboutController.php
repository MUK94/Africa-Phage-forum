<?php
namespace App\Http\Controllers\Admin;

use App\Models\AboutCover;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAboutController extends Controller
{
    public function home()
    {
        $viewData = [];
        $viewData ["title"] = "APF | Header Page Admin";
        $viewData ["subtitle"] = "About Header Page Admin";
        $viewData ["about_covers"] = AboutCover::all();
        return view('admin.aboutCover.home')->with("viewData", $viewData);
    }
    
    // @CRUD OPERATIONS
    public function store(Request $request)
    {
        AboutCover::validate($request);
        
        $newAboutCover = new AboutCover();
        $newAboutCover -> setTitle($request->input('title'));
        $newAboutCover -> setQuote($request->input('quote'));
        $newAboutCover -> setImage('aboutCover-1.png');
        $newAboutCover -> save();
        
        if ($request->hasFile('image')) {
            $imageName = $newAboutCover->getId()."_coverAbout".".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newAboutCover -> setImage($imageName);
            $newAboutCover -> save();
        }
        
        return redirect()->route('pages.about');
    }
    // 2- ||----EDIT---||
    public function edit($id)
    {
        $viewData = [];
        $viewData ["title"] = "Admin | About - APF Website";
        $viewData ["subtitle"] = "Edit About Header Page";
        $viewData ["aboutCover"] = AboutCover::findOrFail($id);
        return view('admin.aboutCover.edit')->with("viewData", $viewData);
    }
    // 3- ||----UPDATE---||
    public function update(Request $request, $id)
    {
        AboutCover::validate($request);

        
        $aboutCover = AboutCover::findOrFail($id);
        $aboutCover -> setTitle($request->input('title'));
        $aboutCover -> setQuote($request->input('quote'));
        $aboutCover -> setImage('cover-1.png');

        if ($request->hasFile('image')) {
            $imageName = $aboutCover->getId()."_coverAbout".".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $aboutCover->setImage($imageName);
        }
        $aboutCover->save();

        return redirect()->route('pages.about');

    }
    
    // 4- ||----DELETE---||
    public function delete($id)
    {
        AboutCover::destroy($id);
        return back();
    }
}
