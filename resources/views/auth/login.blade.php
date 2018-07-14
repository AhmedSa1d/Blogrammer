@extends('main')

@section('title',' | Login')
@section('stylesheets')
 <link rel="stylesheet" type="text/css" href="{{asset('css/parsley.css')}}">

@endsection

@section('content')
	<div class="row">
		<div class="Bord col-md-4 col-md-offset-4">
			<h1>Login</h1>
			<hr>
			<form method="post" data-parsley-validate action="">
				{{csrf_field()}}
                    <div class="form-group">
                        <label name="email" >Email:</label>
                        <input type="email" id="email" name="email" maxlength="255" placeholder="Add Your Email" class="form-control" required="">
                    </div>
                     <div class="form-group">
                        <label name="password" >Password:</label>
                        <input type="password" id="password" name="password" minlength="5" maxlength="255" placeholder="Add Your password" class="form-control" required="">
                    </div>
                    <div class="custom-control custom-checkbox">
						 <input type="checkbox" class="custom-control-input" id="customCheck1">
						 <label class="custom-control-label" for="customCheck1">Remember Me</label>
					</div>
                    <div class="form-group text-center">
                    <input type="submit" value="Login" class="btn btn-block btn-primary">
                	</div>
                </form>
                <div class="text-center">
                    <a href="{{ url('password/reset') }}">Forget My Password</a>
                </div>
		</div>
	</div>

@endsection
@section('scripts')
	<script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>
@endsection