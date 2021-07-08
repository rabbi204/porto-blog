<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    /**
    * for Blog page show
    */
    public function showBlogPage()
    {
       $all_posts = Post::where('status', true ) ->latest() -> paginate(5);
       return view('porto.blog',[
           'all_posts' => $all_posts,
       ]);
    }

    /**
    * for Blog page show
    */
    public function showSingleBlogPage()
    {
    //    $all_posts = Post::where('status', true ) -> get();
       return view('porto.blog-single');
    }


}
