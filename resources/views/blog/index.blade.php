@extends('main')

@section('title',' |  Blog ')

@section('content')
	
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>All Blog Posts</h1>
			<hr>
		</div>
	</div>
	 <div class="row main-content" >
            @foreach($posts as $post)
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <a href="{{ route('blog.single',$post->slug) }}" class="thumbnail">
                    <img src="{{ asset('images/'.$post->image) }}" alt="{{$post->title}}">
                  </a>  
                  <div class="caption">
                    <h3><a href="{{ route('blog.single',$post->slug) }}">{{$post->title}}</a></h3>
                    <p>{{substr(strip_tags($post->body),0,90)}}{{strlen(strip_tags($post->body))>50 ? "..." : ""}}</p>
                    <div class="tags">
                        @foreach($post->tags as $tag)
                        <span class="label label-primary">{{$tag->name}}</span>
                        @endforeach
                        
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
	<div class="row">
		<div class="col-md-8 text-center col-md-offset-2">
			{!!$posts->links()!!}
		</div>
	</div>

@endsection

@section('javascript')

  <script>
    
    
  </script>
@endsection