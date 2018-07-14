    <footer class="footer text-center">
        <div class="row" class="foter text-center">
              <div class="col-md-2 col-md-offset-1 foter text-center" id="footlogo" >
                  <p> <a href="{{ url('/') }}">Blogrammer</a></p>
              </div>

              <div class="col-md-2 col-md-offset-1 foter text-center">
                 <ul class=" " >
                    <li><a href="{{ url('/') }}" >Home</a></li>
                    <li><a href="{{ url('blog') }}">Blog</a></li>
                    <li><a href="{{ url('about') }}" >About us</a></li>
                    <li><a href="{{ url('contact') }}">Contact us</a></li>
                 </ul>
              </div>
          <div class="col-md-1"></div>
              <div class="col-md-3 foter text-center">
                  <a href="https://www.facebook.com/ahmed.abdalmotleb.5">
                    <img class="socialm" src="{{asset('images/fc.png')}}" >
                  </a>
                  <a href="https://twitter.com/AhmedSa1d">
                    <img class="socialm" src="{{asset('images/tw.png')}}" >
                  </a>
                  <a href="https://www.youtube.com/channel/UCWdozqj16V4vMgjrHD3J0lA">
                    <img class="socialm" src="{{asset('images/yt.png')}}" >
                  </a>
                  <a href="https://www.linkedin.com/in/ahmedsa1d">
                    <img class="socialm" src="{{asset('images/in.png')}}" >
                  </a>
                  <a href="https://github.com/ahmedsa1d">
                    <img class="socialm" src="{{asset('images/gt.png')}}" >
                  </a>

              </div>

        </div>
        <div class="row" >
          <div class="col-md-12 text-center" id="copyright">
            <p>Copy Right  <a href="https://www.facebook.com/ahmed.abdalmotleb.5">Ahmed Said </a>
            <span class="glyphicon glyphicon-copyright-mark"></span> 2018</p>
          </div>
          
        </div>
    </footer>