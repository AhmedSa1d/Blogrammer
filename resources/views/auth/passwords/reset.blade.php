@extends('main')

@section('title',' | Reset Password')
@section('stylesheets')
 <link rel="stylesheet" type="text/css" href="{{asset('css/parsley.css')}}">

@endsection

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
                <div class="panel-heading">Reset Password</div> 
                <div class="panel-body">
                    <form method="post" data-parsley-validate action="{{ url('password/reset') }}">
                    {{csrf_field()}}
               
                    <input name="_token" type="hidden" value="{{ $token }}">
                        <div class="form-group">
                            <label name="email" >Email:</label>
                            <input type="email" id="email" name="email" value="{{$email}}" maxlength="255" placeholder="Add Your Email" class="form-control" required="">
                        </div>
                        <div class="form-group">
                        <label name="password" >New Password:</label>
                        <input type="password" id="password" name="password" minlength="5" maxlength="255" placeholder="New password" class="form-control" required="">
                    </div>
                      <div class="form-group">
                        <label name="password_confirmation" >Confirm Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" minlength="5" maxlength="255" placeholder="Confirm Your password" class="form-control" required="">
                    </div>

                        <div class="form-group text-center">
                        <input type="submit" value="Reset Password" class="btn btn-block btn-primary">
                        </div>
                    </form>
                    
                </div> 

            </div>
		</div>
	</div>

@endsection
@section('scripts')
	<script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>
@endsection