<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AboutCover;
use App\Models\AboutSection;
use App\Models\Team;
use Illuminate\Http\Request;



class ViewController extends Controller
{
    // About
    public function about()
    {
        $viewData = [];
        $viewData["title"] = "APF | Who we are?";
        $viewData["subtitle"] = "About us ";

        // About Models
        $viewData["about_covers"] = AboutCover::all();
        $viewData["about_sections"] = AboutSection::all();

        return view('pages.about')->with("viewData", $viewData);
    }

    // @Team
    public function team()
    {
        $viewData = [];
        $viewData = [];
        $viewData["title"] = "APF | Join one of our Teams";
        $viewData["subtitle"] = "APF Global Network";
        $viewData["teams"] = Team::orderBy('created_at', 'desc')->paginate(32);
        return view('pages.team')->with("viewData", $viewData);
    }

    // @Contact
    public function contact()
    {
        $viewData = [];
        $viewData["title"] = "Contact | Contact us";
        $viewData["subtitle"] = "Let's get in touch";
        return view('pages.contact')->with("viewData", $viewData);
    }


    // @Contact
    public function thanks()
    {
        $viewData = [];
        $viewData["title"] = "Thank you | Contact us";
        $viewData["subtitle"] = "Thanks for contacting us";
        return view('pages.thanks')->with("viewData", $viewData);
    }


}
