<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData ["title"] = "Admin | APF Website";
        $viewData ["subtitle"] = "APF Admin Panel";
        return view('admin.home.index')->with("viewData", $viewData);
    }
}
