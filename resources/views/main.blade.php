<!DOCTYPE html>
<html lang="en">
   <head>
    @include('partials._head')
  </head>
 <body>
  <a href="<<URL>>" class="ajax-call">..</a>
<div id="loadingbar-frame"></div>
  <div id="progress" class="waiting">
    <dt></dt>
    <dd></dd>
  </div>
    @include('partials._nav')
    <div class="container home-container">
      @include('partials._messages')
       
      @yield('content')
    </div> <!-- /.end of container div -->
  @include('partials._footer')
  @include('partials._javascript')
    @yield('scripts')
  </body>
</html>