@extends('main')

@section('title', ' | All Posts')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btm-lg btn-primary btn-block btn-h1-spacies">Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div><!-- this is the end of the row !-->
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th></th>

				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<th>{{$post->id}}</th>
							<td>{{substr($post->title,0,40)}}{{strlen($post->title) > 40 ? "..." : ""}}</td>

							<td>{{substr(strip_tags($post->body),0,60)}}{{strlen(strip_tags($post->body)) > 60 ? "..." : ""}} </td>

							<td>{{date('j M , Y',strtotime($post->created_at))}}</td>
							<td>
								<form method="post" action="{{url('posts',$post->id)}}">
			            			{{csrf_field()}}
			            			<input name="_method" type="hidden" value="DELETE">
			            			<a href="{{ route('posts.show',$post->id) }}" class="btn btn-default btn-sm">View</a>
									 <a href="{{ route('posts.edit', ['Edit' => $post->id])}}" class="btn btn-primary btn-sm">
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
			<div class="text-center">
				{!! $posts->links()!!}
			</div>
		</div>
	</div>

@endsection