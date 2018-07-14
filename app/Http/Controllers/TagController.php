<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;
use Session;

class TagController extends Controller
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
        $tags=Tag::orderBy('id','desc')->paginate(10);;
        return view('tags.index')->withTags($tags);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,array(

            'name'=>'required|max:255'
        ));
        $tag=new Tag;
        $tag->name = $request->name;
        $tag->save();
        Session::flash('success','The Tag is added successfully');
        return redirect()->route('tags.index');
    }

     public function show($id)
    {
        $tag=Tag::find($id);
        return view('tags.show')->withTag($tag);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag=Tag::find($id);
        return view('tags.edit')->withTag($tag);
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
        $this->validate($request ,array(
            'name'=>'required|max:255'
        ));
        $tag=Tag::find($id);
        $tag->name = $request->input('name');
        $tag->save();
        Session::flash('success','The tag is updated successfully');
        return redirect()->route('tags.show',$tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag=Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        Session::flash('success','The tag is deleted successfully');
        return redirect()->route('tags.index');
    }
}
