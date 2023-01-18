<?php
namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPostsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData ["title"] = "Admin | Blogs - APF Website";
        $viewData ["subtitle"] = "Blogs Admin Panel";
        $viewData ["posts"] = Post::all();
        return view('admin.posts.index')->with("viewData", $viewData);
    }
    
    // @CRUD OPERATIONS
    // 1- ||----STORE - CREATE---||
    public function store(Request $request)
    {
        Post::validate($request);
        
        $newPost = new Post();
        $newPost -> setTitle($request->input('title'));
        $newPost -> setSlug(Str::slug($request->input('title'), '-'));
        $newPost -> setDescription($request->input('description'));
        $newPost -> setImage('post-6.png');
        $newPost -> save();
        
        if ($request->hasFile('image')) {
            $imageName = $newPost->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newPost -> setImage($imageName);
            $newPost -> save();
        }
        // return back();
        return redirect()->route('posts.blog');
    }
    // 2- ||----EDIT---||
    public function edit($id)
    {
        $viewData = [];
        $viewData ["title"] = "Admin | Blogs - APF Website";
        $viewData ["subtitle"] = "Edit Blog Posts";
        $viewData ["post"] = Post::findOrFail($id);
        return view('admin.posts.edit')->with("viewData", $viewData);
    }
    // 3- ||----UPDATE---||
    public function update(Request $request, $id)
    {
        Post::validate($request);

        
        $post = Post::findOrFail($id);
        $post->setTitle($request->input('title'));
        $post ->setSlug(Str::slug($request->input('title'), '-'));
        $post->setDescription($request->input('description'));

        if ($request->hasFile('image')) {
            $imageName = $post->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $post->setImage($imageName);
        }
        $post->save();
        // return redirect()->route('admin.posts.index');
        return redirect()->route('posts.show', $post);

    }
    
    // 4- ||----DELETE---||
    public function delete($id)
    {
        Post::destroy($id);
        return back();
    }
}
