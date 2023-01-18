<?php
namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEventsController extends Controller
{
    public function home()
    {
        $viewData = [];
        $viewData ["title"] = "Admin | Events - APF Website";
        $viewData ["subtitle"] = "Events Admin Panel";
        $viewData ["events"] = Event::all();
        return view('admin.events.home')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        Event::validate($request);
        
        $newEvent = new Event();
        $newEvent -> setTitle($request->input('title'));
        $newEvent -> setSpeakerName($request->input('speakerName'));
        $newEvent -> setEventLink($request->input('eventLink'));
        $newEvent -> setSpeakerBio($request->input('speakerBio'));
        $newEvent -> setImage('event-1.png');
        $newEvent -> save();
        
        if ($request->hasFile('image')) {
            $imageName = $newEvent->getId()."_event".".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newEvent -> setImage($imageName);
            $newEvent -> save();
        }
        // return back();
        return redirect()->route('pages.index');
    }
    // 2- ||----EDIT---||
    public function edit($id)
    {
        $viewData = [];
        $viewData ["title"] = "Admin | Events - APF Website";
        $viewData ["subtitle"] = "Edit Events";
        $viewData ["event"] = Event::findOrFail($id);
        return view('admin.events.edit')->with("viewData", $viewData);
    }
    // 3- ||----UPDATE---||
    public function update(Request $request, $id)
    {
        Event::validate($request);

        
        $event = Event::findOrFail($id);
        $event -> setTitle($request->input('title'));
        $event -> setSpeakerName($request->input('speakerName'));
        $event -> setEventLink($request->input('eventLink'));
        $event -> setSpeakerBio($request->input('speakerBio'));
        $event -> setImage('event-1.png');

        if ($request->hasFile('image')) {
            $imageName = $event->getId()."_event".".".$request->file('image')->extension();
            // $imageName = $event->getTitle().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $event->setImage($imageName);
        }
        $event->save();
        // return redirect()->route('admin.events.home');
        return redirect()->route('pages.index');

    }
    
    // 4- ||----DELETE---||
    public function delete($id)
    {
        Event::destroy($id);
        return back();
    }
}
