<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\HomeCover;


class EventsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData = [];
        $viewData["title"] = "Home | Africa Phage Forum";
        $viewData["subtitle"] = "Browse our Events";
        $viewData["events"] = Event::orderBy('created_at', 'desc')->paginate(9);
        
        // HomeCover
        $viewData["home_covers"] = HomeCover::all();
        
        return view('pages.index')->with("viewData", $viewData);
    }
}
