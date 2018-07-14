
@extends('main')
@section('title',' | Contact')
@section('stylesheets')
 <link rel="stylesheet" type="text/css" href="{{asset('css/parsley.css')}}">
@endsection
@section('content')


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="text-center about-logo2">
                    <h1>Blogrammer</h1>
                    <p> Programmers Blog</p>
                </div>
                <hr>
            </div>
            <div class="col-md-6 col-md-offset-3 Bord">
                <div class="text-center">
                    <h1>Contact US</h1>
                    <p>You can contact us from this form .. send your email</p>
                    <p></p>
                </div>
                
                <hr>
                <form method="POST" data-parsley-validate action="{{ url('contact') }}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label name="name" >Full Name:</label>
                        <input type="text" id="name" name="name" required="" maxlength="255" class="form-control">
                    </div>
                    <div class="form-group">
                        <label name="email" >Email:</label>
                        <input type="email" id="email" name="email" required="" maxlength="255" class="form-control">
                    </div>
                    <div class="form-group">
                        <label name="subject" >Subject:</label>
                        <input type="text" id="sub" name="subject" required="" maxlength="255" class="form-control">
                    </div>
                    <div class="form-group">
                        <label name="message" >Message:</label>
                        <textarea type="text" id="message" minlength="10" required="" rows="11" name="message" class="form-control">Type your Message here ...</textarea>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Send Message" class="btn btn-block btn-success"> 
                    </div>
                </form>

            </div>
        </div><!-- /.end of row div -->
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>
@endsection