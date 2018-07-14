@extends('main')

@section('title' , " | $tag->name tag")

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{$tag->name}} Tag <small>{{$tag->posts()->count()}} Posts</small></h1>	
		</div>
		<div class="col-md-4">
			<div class="col-md-6">
    			<a href="{{ route('tags.edit', ['Edit' => $tag->id])}}" class="btn btn-primary btn-h1-spacies btn-block"> Edit Tag</a>
			</div>
			<div class="col-md-6">
				<form method="post" action="{{url('tags',$tag->id)}}">
	    			{{csrf_field()}}
	    			<input name="_method" type="hidden" value="DELETE">
					<button type="submit" class="btn btn-danger btn-h1-spacies btn-block">Delete Tag</button>
										
				</form>

			</div>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Tags</th>
					<th></th>

				</thead>
				<tbody>
					
					@foreach($tag->posts as $post)
						<tr>
							<th>{{$post->id}}</th>
							<td>{{substr($post->title,0,40)}}{{strlen($post->body) > 40 ? "..." : ""}}</td>

							<td>{{substr(strip_tags($post->body),0,60)}}{{strlen(strip_tags($post->body)) > 50 ? "..." : ""}} </td>

							<td>
								@foreach($post->tags as $tag)
									<span class="label label-primary"> <a href="{{ route('tags.show',$tag->id) }}" class="label">{{$tag->name}}</a></span>
								@endforeach
							</td>
							<td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-default btn-sm">View</a>
							 <a href="{{ route('posts.edit', ['Edit' => $post->id])}}" class="btn btn-default btn-sm">Edit</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
	

@endsection
