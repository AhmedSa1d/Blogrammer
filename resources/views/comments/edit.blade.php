@extends('main')

@section('title',' | Update Comments ')

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2" id="comment-form">
			<h1>Edit Comment</h1>
			<hr>
			<form method="post" data-parsley-validate action="{{ url('comments',$comment->id) }}">
				{{csrf_field()}}
				{{ method_field('put') }}
                    <div class="col-md-6 form-group">
                        <label name="name" >Name:</label>
                        <input type="text" id="name" name="name" disabled="disabled" value="{{$comment->name}}" maxlength="255" class="form-control" required="">
                    </div>
                     <div class="col-md-6 form-group">
                        <label name="email" >Email:</label>
                        <input type="email" disabled="disabled" id="email" value="{{$comment->email}}" name="email" minlength="5" maxlength="255" class="form-control" required="">
                    </div>
                    <div class="form-group col-md-12">
                        <label name="comment" >comment:</label>
                        <textarea type="text" id="comment" name="comment" rows="6"  class="form-control" required="">{{$comment->comment}}</textarea>
                    </div>
                    <div class="form-group col-md-12 text-center">
                        <div class="col-md-6">
                            <a href="{{ route('posts.show',$comment->post->id) }}" class="btn btn-block btn-danger">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" value="Update Comment" class="btn btn-block btn-success">
                        </div>
                	</div>
                </form>
		</div>
	</div>

@endsection