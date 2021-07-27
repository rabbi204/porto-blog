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
    * for single Blog page show
    */
    public function showSingleBlogPage($slug)
    {
    
        $single_post = Post::where('slug', $slug ) -> first();

       return view('porto.blog-single',compact('single_post'));
    }

    /**
     *  blog search by searchbox
     */

     public function searchBlog(Request $request){

        if( empty($request -> search) ){
            $search = '';
        }else{
            $search = $request -> search;
        }
        
        $posts = Post::where('title','LIKE','%'. $search .'%')-> latest() -> paginate();
        $all_cats = Category::where('status', true ) ->latest() -> get();
        return view('porto.blog-search', [
            'all_posts'  => $posts,
            'all_cats' => $all_cats,
        ]);
     }

     /**
      * blog search by category
      */
    public function blogSearchByCategory($slug){

        $cats = Category::where('slug',$slug) -> first();
        return view('porto.category-blog',[
            'all_posts'  => $cats -> posts,
        ]);
    }


}
