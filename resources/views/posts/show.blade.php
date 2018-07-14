@extends('main')

@section('title',' | View Post')

@section('content')

	<div class="row">
		<div class=" post col-md-8">
			<div class="post-image">
				<img class="img-responsive" src="{{ asset('images/'.$post->image) }}">
			</div>
			<div class="post-title">
				<h1> {{$post->title}} </h1>
				<p> {{date('j M , Y  h:i a',strtotime($post->created_at))}} </p>
			</div>
			<p class="lead"> {!!$post->body!!} </p>
			<hr>
			<div class="tags">
				@foreach($post->tags as $tag)
				<span class="label label-primary"> <a href="{{ route('tags.show',$tag->id) }}" class="label">{{$tag->name}}</a></span>
				@endforeach
				
			</div>
			<div id="background-comments">
				<h4 class="comments-title">
					<span class="glyphicon glyphicon-comment"></span>
					{{$post->comments()->count()}} Comments
				</h4>
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th></th>

					</thead>
					<tbody>
						@foreach($post->comments as $comment)
							<tr>
								<th>{{$comment->id}}</th>
								<td>{{substr($comment->name,0,40)}}{{strlen($comment->name) > 40 ? "..." : ""}}</td>
								<td>{{substr($comment->email,0,60)}}{{strlen($comment->email) > 60 ? "..." : ""}} </td>
								<td>{!!strip_tags(substr($comment->comment,0,60))!!}{!!strip_tags(strlen($comment->comment)) > 60 ? "..." : ""!!} </td>

								<td>
									<form method="post" action="{{url('comments',$comment->id)}}">
			            			{{csrf_field()}}
			            			<input name="_method" type="hidden" value="DELETE">
			            			<a href="{{ route('comments.edit', ['Edit' => $comment->id])}}" class="btn btn-sm btn-primary">
									<span class="glyphicon glyphicon-pencil"></span>
									</a>
									<button type="submit" class="btn btn-sm btn-danger">
										<span class="glyphicon glyphicon-trash"></span>
									</button>
									
									</form>

								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>URL Slug :</label>
					<p> <a href="{{ route('blog.single',$post->slug) }}">{{route('blog.single',$post->slug)}}</a> </p>
				</dl>
				<dl class="dl-horizontal">
					<label>Category :</label>
					<p> {{ $post->category->name }} </p>
				</dl>
				<dl class="dl-horizontal">
					<label>Created At :</label>
					<p> {{date('j M , Y h:ia',strtotime($post->created_at))}} </p>
				</dl>		
				<dl class="dl-horizontal">
					<label>Last Update :</label>
					<p>{{date('j M , Y h:ia',strtotime($post->updated_at))}}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.edit', ['Edit' => $post->id])}}" class="btn btn-primary btn-block">Edit</a>
						
					</div>

					<div class="col-sm-6">
						<form action="{{url('posts', $post->id)}}" method="post">
			            {{csrf_field()}}
			            <input name="_method" type="hidden" value="DELETE">
			            <button class="btn btn-block btn-danger" type="submit">Delete</button>
			          </form>
						
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<a href="{{ route('posts.index') }}" class="btn btn-block btn-default btn-h1-spacies"> << See All Posts >> </a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection