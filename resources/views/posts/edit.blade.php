@extends('main')

@section('title',' | Edit Post')
@section('stylesheets')
 <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8">
			<form  method="post" enctype="multipart/form-data" data-parsley-validate="" action="{{ url('posts', $post->id) }}">
				{{csrf_field()}}
				{{ method_field('PATCH') }}
                    <div class="form-group">
                        <label name="title" >Title:</label>
                        <input type="text" id="title" name="title" maxlength="255" value="{{$post->title}}" class="form-control input-lg" required="">
                    </div>
                    <div class="form-group">
                        <label name="slug" >Slug:</label>
                        <input type="text" id="slug" name="slug" minlength="5" maxlength="255" value="{{$post->slug}}" class="form-control " required="">
                    </div>
                    <div class="form-group">
                        <label name="category_id">Category :</label>
                        <select name="category_id" class="form-control"  required="" id="category_id">
                                <option selected="" value="{{$post->category_id}}">
                                	@if(!isset($post->category->name))
                                		{{""}}
                                	@else
                                	 {{$post->category->name}}
                                	@endif
                                	
                                </option>
                            @foreach($categories as $category)
                                <option  value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label name="tags">Tags :</label>
                        <select name="tags[]"  class="form-control js-example-basic-multiple" multiple="multiple" required="" id="category_id">
                        	@foreach($post->tags as $tag)
                        		<option selected="" value="{{$tag->id}}">{{$tag->name}}</option>
                        	@endforeach
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                        <img src="{{ asset('images/'.$post->image) }}" width="90" height="90">
                     <div class="form-group">
                        <label name="fileName" >Post Image:</label>
                        <input type="file" id="fileName"  name="fileName" maxlength="255" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label name="body" >Body:</label>
                        <textarea type="text" name="body" rows="11"  class="form-control"> {{$post->body}}</textarea>
                    </div>
			
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>URL Slug :</label>
					<p> <a href="{{ url($post->slug) }}">{{url($post->slug)}}</a> </p>
				</dl>
				<dl class="dl-horizontal">
					<label>Category :</label>
					<p> 
			            @if(!isset($post->category->name))
                    		{{""}}
                    	@else
                    	 	{{$post->category->name}}
                    	@endif


					 </p>
				</dl>
				<dl class="dl-horizontal">
					<label>Created At :</label>
					<p> {{date('j M , Y h:ia',strtotime($post->created_at))}} </p>
				</dl>		
				<dl class="dl-horizontal">
					<label>Last Update :</label>
					<p>{{date('j M , Y h:ia',strtotime($post->updated_at))}}</p>
				</dl>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{route('posts.show',$post->id)}}" class="btn btn-danger btn-block">Cancel</a>
						
					</div>

					<div class="col-sm-6">
						 <input type="submit" value="Save" class="btn btn-block btn-success">
						
					</div>
				</div>
			</div>
         

		</div>
		</form>
	</div><!--end of row and form !-->

@endsection
@section('scripts')
	<script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
@endsection