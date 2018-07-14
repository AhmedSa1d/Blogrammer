

     <nav class="navbar navbar-custom ">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="head-logo navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Blogrammer</a>
        </div>
        

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="{{Request::is('/')? "active" : ""}}"><a href="{{ url('/') }}">Home</a></li>
            <li class="{{Request::is('blog')? "active" : ""}}"><a href="{{ url('blog') }}">Blog</a></li>
            <li class="{{Request::is('about')? "active" : ""}}"><a href="{{ url('about') }}">About</a></li>
            <li class="{{Request::is('contact')? "active" : ""}}"><a href="{{ url('contact') }}">Contact</a></li>
          </ul>
          @if(auth::check())
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{auth::user()->name}} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('posts.index') }}">posts</a></li>
                <li><a href="{{ route('posts.create') }}">Create Post</a></li>
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                <li><a href="{{ route('tags.index') }}">Tags</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
              </ul>
            </li>
          </ul>
          @else
          <div>
            <a href="{{ route('register') }}" class=" btn btn-primary navbar-btn navbar-right"  role="button" >Regiser</a>
            
            <a href="{{ route('login') }}" class=" btn btn-primary navbar-btn navbar-right"  role="button" >Login</a>
          </div>
          

          
          @endif
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>