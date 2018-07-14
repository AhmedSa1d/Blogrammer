<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;
use Auth;
class PostController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blog post in it from database
        $posts=Post::orderBy('id','desc')->paginate(10);
        //return a view with this variable 
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        //validate the data
        $this->validate($request,array(

            'title'      =>'required|max:255',
            'slug'       =>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|numeric',
            'body'       =>'required',
            'image'      =>'sometimes|image'
        ));
        //dd($request->all());
        //store the data
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->user_id = Auth::user()->id;
        $post->category_id=$request->category_id;
        $post->body  =Purifier::clean($request->body);
        //save the image 

        if ($request->file('fileName')) {
            $image = $request->file('fileName');
            $filename = time().md5($image->getClientOriginalName()). '.' .$image->getClientOriginalExtension();

            $location=public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            //save it to the database
            $post->image= $filename;
        }
        $post->save();
        $post->tags()->sync($request->tags , false);

        \Session::flash('success','The blog post was successfuly saved . '); 
        //redirect 
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =Post::find($id);
        
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and pass it into variable 
        $post = Post::find($id);
        $categories=Category::all();
        $tags=Tag::all();
        //return a view with the variable previously created
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        //validate the data
        $this->validate($request,array(
            'title'=>'required|max:255',
            'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id'=>'required|numeric',
            'body'=>'required',
            'image'      =>'sometimes|image'

        ));
        //store the data
        $post=Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->input('category_id');
        $post->body  = Purifier::clean($request->input('body'));

        //update the image
        if($request->file('fileName')){
            //add a new photo
            $image = $request->file('fileName');
            $filename = time().md5($image->getClientOriginalName()). '.' .$image->getClientOriginalExtension();

            $location=public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $oldImage=$post->image;
            //update the database
            $post->image= $filename;
            //delete the old photo
            Storage::delete($oldImage);
        }

        $post->save();
        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync(array());

        }
        //set flash data with success message
        Session::flash('success','This post was successfuly updated');
        //redirect with flash data to posts.show
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        Session::flash('success','The post has been deleted');
        return redirect()->route('posts.index');
    }
}
