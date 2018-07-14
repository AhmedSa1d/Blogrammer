@extends('main')

@section('title',' | Register')
@section('stylesheets')
 <link rel="stylesheet" type="text/css" href="{{asset('css/parsley.css')}}">

@endsection

@section('content')
	<div class="row">
		<div class="Bord col-md-4 col-md-offset-4">
			<h1>Register</h1>
			<hr>
			<form method="post" data-parsley-validate action="">
				{{csrf_field()}}
					<div class="form-group">
                        <label name="name" >Name:</label>
                        <input type="text" id="name" name="name" maxlength="255" placeholder="Add Your Name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label name="email" >Email:</label>
                        <input type="email" id="email" name="email" maxlength="255" placeholder="Add Your Email" class="form-control" required="">
                    </div>
                     <div class="form-group">
                        <label name="password" >Password:</label>
                        <input type="password" id="password" name="password" minlength="5" maxlength="255" placeholder="Add Your password" class="form-control" required="">
                    </div>
                      <div class="form-group">
                        <label name="password_confirmation" >Confirm Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" minlength="5" maxlength="255" placeholder="Confirm Your password" class="form-control" required="">
                    </div>
                     
                    <div class="form-group text-center">
                    <input type="submit" value="Register" class="btn btn-block btn-primary">
                	</div>
                </form>
		</div>
	</div>

@endsection
@section('scripts')
	<script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>
@endsection