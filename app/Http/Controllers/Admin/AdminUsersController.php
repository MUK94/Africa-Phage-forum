<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminUsersController extends Controller
{
    public function home()
    {
        $viewData = [];
        $viewData ["title"] = "Admin | Users - APF Website";
        $viewData ["subtitle"] = "Users Admin Panel";
        $viewData ["users"] = User::all();
        return view('admin.user.home')->with("viewData", $viewData);
    }
    
    // 2- ||----EDIT---||
    public function edit($id)
    {
        $viewData = [];
        $viewData ["title"] = "Admin | Users - APF Website";
        $viewData ["subtitle"] = "Update user role";
        $viewData ["user"] = user::findOrFail($id);
        return view('admin.user.edit')->with("viewData", $viewData);
    }
    // 3- ||----UPDATE---||
    public function update(Request $request, $id)
    {
        // User::validate($request);

        
        $user = User::findOrFail($id);
        $user->setRole($request->input('role'));
        $user->save();

        return redirect()->route('admin.user.home');
    }
    
    // 4- ||----DELETE---||
    public function delete($id)
    {
        User::destroy($id);
        return back();
    }
}
