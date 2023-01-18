<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function blog()
    {
        $viewData = [];
        $viewData["title"] = "Blog | Africa Phage Forum";
        $viewData["subtitle"] = "Explore our blogs";
        $viewData["posts"] = Post::orderBy('created_at', 'desc')->paginate(18);
        return view('posts.blog')->with("viewData", $viewData);
    }
    public function show($slug)
    {
        $viewData = [];
        $post = Post::where('slug', $slug)->first();
        $viewData["title"] = $post->getTitle()." | APF Website";
        $viewData["subtitle"] = $post->getTitle()." | Post information";
        $viewData["post"] = $post;
        return view('posts.show')->with("viewData", $viewData);
    }
}
