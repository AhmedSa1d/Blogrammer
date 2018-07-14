
@extends('main')
@section('title',' | Home')
@section('stylesheets')
@endsection

@section('content')
        <div class="row">
          <div class="col-md-8 col-md-offset-2">


            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
               
              <div class="carousel-inner" role="listbox">

                 @foreach($categories as $category)
                  <?php $i=0; ?>

                 @foreach($category->posts()->orderBy('id','desc')->get() as $post)
                <div class="item {{ $category->id==1 ? " active" : ""}}">
                  <img class="img-responsive" src="{{ asset('images/'.$post->image) }}" alt="...">
                  <div class="carousel-caption">
                     <h3>
                      <a href="{{ route('blog.single',$post->slug) }}">
                        {{substr($post->title,0,70)}}{{strlen($post->title) > 70 ? "..." : ""}}
                      </a>
                    </h3>
                      
                  </div>
                </div>

                <?php
                if (++$i==1){
                  break;
                }
               ?>
            @endforeach

            @endforeach
              </div>
              

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            </div>


           
        </div><!-- /.end of row div -->

        <hr>


        <div class="row main-content" >
            @foreach($posts as $post)
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <a href="{{ route('blog.single',$post->slug) }}" class="thumbnail">
                    <img src="{{ asset('images/'.$post->image) }}" alt="{{$post->title}}">
                  </a>  
                  <div class="caption">
                    <h3><a href="{{ route('blog.single',$post->slug) }}">
                      {{substr($post->title,0,70)}}{{strlen($post->title) > 70 ? "..." : ""}}</a></h3>
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
             <div class=" see-posts col-md-4 col-md-offset-4">
                    <h1><a href="{{ url('blog') }}" class="btn btn-default btn-lg btn-block">SEE ALL POSTS</a></h1>
            </div>
        </div>
       
                
           
@endsection
@section('scripts')

@endsection
