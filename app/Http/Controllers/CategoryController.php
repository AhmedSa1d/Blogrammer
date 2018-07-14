<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
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
        //display a view for all category 
        // it also have a form to create a new category so no need create() function

        $categories=Category::all();
        return view('categories.index')->withCategories($categories);


    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save new category with redirect to index page
        $this->validate($request ,array(
            'name'=>'required|max:255'
        ));
        $category=new Category;
        $category->name=$request->name;
        $category->save();
        Session::flash('success','The Category was successfuly saved . ');
        return redirect()->route('categories.index'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('categories.edit')->withCategory($category);
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
        $category=Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        Session::flash('success','The Category is updated successfuly');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        Session::flash('success','The category has been deleted');
        return redirect()->route('categories.index');
    }
}
