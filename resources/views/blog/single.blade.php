@extends('main')
<?php $postTitle=htmlspecialchars($post->title); ?>
@section('title' , " | $postTitle" )

@section('content')

	<div class="row">
		<div class="post col-md-8">
			<div class="post-image">
				<img class="img-responsive" src="{{ asset('images/'.$post->image) }}">
			</div>
			<div class="post-content">
				<div class="post-title">
					<h1> {{$post->title}} </h1>
					<p> {{date('j M , Y  h:i a',strtotime($post->created_at))}} </p>
				</div>
				<div class="post-body">
					<p> {!!$post->body!!} </p>
				</div>
				<hr>
				<p>Category : {{$post->category->name}} </p>
				<div class="tags">
					@foreach($post->tags as $tag)
					<span class="label label-primary">{{$tag->name}}</span>
					@endforeach
					
				</div>

			</div>
			<hr>
			<div class="row">
				<div id="comment-result" class="col-md-8   col-md-offset-2">
				<h4 class="comments-title">
					<span class="glyphicon glyphicon-comment"></span>
					{{$post->comments()->count()}} Comments
				</h4>
					@foreach($post->comments()->orderBy('id','desc')->get() as $comment)
						<div class="comment" id="comment">
							<div class="auther-info">
								<div class="auther-image">
									<img src="{{"https://www.gravatar.com/avatar/HASH".md5(strtolower(trim($comment->email)))."?d=mm"}}" class="">
									
								</div>
								<div class="auther-name">
									<h4>{{$comment->name}}</h4>
									<p> {{date('j M , Y  h:i a',strtotime($comment->created_at))}} </p>
								</div>
							</div>
							<div class="comment-body">
								<p>{!!$comment->comment!!}</p>		
							</div>
							
					
						</div>
						
					@endforeach
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<form method="post" id="comment-form2" data-parsley-validate action="{{ url('comments',$post->id) }}">
						{{csrf_field()}}
		                    <div class="col-md-6 form-group">
		                        <label name="name" >Name:</label>
		                        <input type="text" id="name" name="name" maxlength="255" placeholder="Add Post Name" class="form-control" required="">
		                    </div>
		                     <div class="col-md-6 form-group">
		                        <label name="email" >Email:</label>
		                        <input type="email" id="email" name="email" minlength="5" maxlength="255" placeholder="Add Your Email" class="form-control" required="">
		                    </div>
		                    <div class="form-group col-md-12">
		                        <label name="comment" >comment:</label>
		                        <textarea type="text" id="comment" placeholder="Add Your Comment" name="comment" rows="6"  class="form-control" required=""></textarea>
		                    </div>
		                    <div class="form-group col-md-12 text-center">
		                    <input type="submit" value="Add comment" class="btn btn-block btn-success">
		                	</div>
		                </form>
				</div>
			</div>
					
			</div>
		<div class="sidebar main-content col-md-4 text-center">
			<div class="sidebar-head col-sm-12 text-center">
				<h1> Most Reading Posts</h1>
			</div>
			@foreach($posts as $post)
              <div class="col-sm-6 col-md-12">
                <div class="sidebar-photo thumbnail">
                  <a href="{{ route('blog.single',$post->slug) }}" class="thumbnail">
                    <img src="{{ asset('images/'.$post->image) }}" alt="{{$post->title}}">
                  </a>  
                  <div class="sidebar-title">
                    <h3><a href="{{ route('blog.single',$post->slug) }}">{{$post->title}}</a></h3>
                  </div>
                </div>
                <hr>
              </div>
            @endforeach
            <div class=" see-posts col-md-12">
           <h1><a href="{{ url('blog') }}" class="btn btn-default btn-lg btn-block">SEE ALL POSTS</a></h1>
        	</div>

		</div>
		
	</div>



@endsection
