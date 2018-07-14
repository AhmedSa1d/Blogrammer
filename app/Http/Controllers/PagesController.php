<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Session;
use App\Category;
use App\Post;

class PagesController extends Controller{
	
	public function getIndex(){
		#process variables or params
		#talk to the model
		#receive from the model
		#compile or process data from the model if needed 
		#pass this data to the correct view
		$categories=Category::orderBy('created_at')->limit(3)->get();
		$posts=Post::orderBy('created_at','desc')->limit(6)->get();
		return view('pages.welcome')->withPosts($posts)->withCategories($categories);
	}

	public function getAbout(){
		$fname="ahmed";
		$lname="said";
		$flname=$fname ." ". $lname;
		return view('pages.about')->with('Name',$flname);
	}

	public function getContact(){
		$fname="ahmed";
		$lname="said";
		$flname=$fname ." ". $lname;
		$email="ahmedsaid5556@hotmail.com";
		$Data=[];
		$Data['email']=$email;
		$Data['flname']=$flname;
		return view('pages.contact')->withData($Data);
	}
	public function postContact(Request $request){
		$this->validate($request,array(
			'name'=>'required|max:255',
			'email'=>'required|max:255|email',
			'subject'=>'required|max:255',
			'message'=>'required|min:10'
		));
		$email=array(
			'name'=>$request->name,
			'email'=>$request->email,
			'subject'=>$request->subject,
			'bodyMessage'=>$request->message
		);
		Mail::send('emails.contact',$email,function($message) use($email){
			$message->from($email['email']);
			$message->to('ahmedabdalmotleb@gmail.com');
			$message->subject($email['subject']);
		});
		Session::flash('success','Your email has been sent to us thanks for contact ');
		return view('pages.contact');
	}

	
}