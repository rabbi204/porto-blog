<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    /**
    * for Blog page show
    */
    public function showBlogPage()
    {
       $all_posts = Post::where('status', true ) -> where('trash', false) ->latest() -> paginate(4);
       $all_cats = Category::where('status', true ) ->latest() -> get();
       return view('porto.blog',[
           'all_posts' => $all_posts,
           'all_cats' => $all_cats,
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
