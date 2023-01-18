<?php
namespace App\Http\Controllers\Admin;

use App\Models\HomeCover;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHomeCoverController extends Controller
{
    public function home()
    {
        $viewData = [];
        $viewData ["title"] = "APF | HomeCover Page Admin";
        $viewData ["subtitle"] = "HomeCover Page Admin";
        $viewData ["home_covers"] = HomeCover::all();
        return view('admin.homeCover.home')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        HomeCover::validate($request);
        
        $newHomeCover = new HomeCover();
        $newHomeCover -> setTitle($request->input('title'));
        $newHomeCover -> setQuote($request->input('quote'));
        $newHomeCover -> setImage('homeCover-1.png');
        $newHomeCover -> save();
        
        if ($request->hasFile('image')) {
            $imageName = $newHomeCover->getId()."_coverHome".".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newHomeCover -> setImage($imageName);
            $newHomeCover -> save();
        }
        // return back();
        return redirect()->route('pages.index');
    }
    // 2- ||----EDIT---||
    public function edit($id)
    {
        $viewData = [];
        $viewData ["title"] = "Admin | Home - APF Website";
        $viewData ["subtitle"] = "Edit Home Page Header";
        $viewData ["homeCover"] = HomeCover::findOrFail($id);
        return view('admin.homeCover.edit')->with("viewData", $viewData);
    }
    // 3- ||----UPDATE---||
    public function update(Request $request, $id)
    {
        HomeCover::validate($request);

        
        $homeCover = HomeCover::findOrFail($id);
        $homeCover -> setTitle($request->input('title'));
        $homeCover -> setQuote($request->input('quote'));
        $homeCover -> setImage('cover-1.png');

        if ($request->hasFile('image')) {
            $imageName = $homeCover->getId()."_coverHome".".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $homeCover->setImage($imageName);
        }
        $homeCover->save();
        // return redirect()->route('admin.events.home');
        return redirect()->route('pages.index');

    }
    
    // 4- ||----DELETE---||
    public function delete($id)
    {
        HomeCover::destroy($id);
        return back();
    }
}
