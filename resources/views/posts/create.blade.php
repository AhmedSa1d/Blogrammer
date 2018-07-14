@extends('main')
 

@section('title',' | Create New Post')

@section('stylesheets')
 <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			<form method="post" enctype="multipart/form-data" data-parsley-validate action="{{ url('posts') }}">
				{{csrf_field()}}
                    <div class="form-group">
                        <label name="title" >Title:</label>
                        <input type="text" id="title" name="title" maxlength="255" placeholder="Add Post Title" class=" file-input form-control" required="">
                    </div>
                     <div class="form-group">
                        <label name="slug" >Slug:</label>
                        <input type="text" id="slug" name="slug" minlength="5" maxlength="255" placeholder="Add Post slug" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label name="category_id">Category :</label>
                        <select name="category_id" class="form-control" required="" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label name="tags">Tags :</label>
                        <select name="tags[]"  class="form-control js-example-basic-multiple" multiple="multiple" required="" id="category_id">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label name="fileName" >Post Image:</label>
                        <input type="file" id="fileName" name="fileName" maxlength="255" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label name="body" >Body:</label>
                        <textarea type="text" id="body" placeholder="Add Post Body Here " name="body" rows="11"  class="form-control"> Add Post Body Here ...</textarea>
                    </div>
                    <div class="form-group text-center">
                    <input type="submit" value="Create New Post" class="btn btn-block btn-success">
                	</div>
                </form>
		</div>
	</div>



@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
@endsection