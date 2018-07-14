@extends('main')

@section('title',' | Forget Password')
@section('stylesheets')
 <link rel="stylesheet" type="text/css" href="{{asset('css/parsley.css')}}">

@endsection

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
                <div class="panel-heading">Reset Password</div> 

                <div class="panel-body">

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif

                    <form method="post" data-parsley-validate action="{{ url('password/email') }}">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label name="email" >Email:</label>
                            <input type="email" id="email" name="email" maxlength="255" placeholder="Add Your Email" class="form-control" required="">
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