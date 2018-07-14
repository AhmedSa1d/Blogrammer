<?php

namespace App\Http\Controllers;

use App\Post;

class BlogController extends Controller{
	
	public function getIndex(){
		//get posts from database 
        $posts=Post::orderBy('id','desc')->paginate(9);
        //return to the index view with to posts variable
        return view('blog.index')->withPosts($posts);
			
	}

	public function getSingle($slug){
		#process variables or params
		#talk to the model
		#receive from the model
		#compile or process data from the model if needed 
		#pass this data to the correct view
		 $post =Post::where('slug','=',$slug)->first();
		$posts = Post::orderBy('id')->limit(10)->get();
        return view('blog.single')->with('post',$post)->withPosts($posts);
	}

	
}