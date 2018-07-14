@extends('main')

@section('title',' | Edit Category')
@section('stylesheets')
 <link rel="stylesheet" type="text/css" href="{{asset('css/parsley.css')}}">

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8">
			<form  method="post" data-parsley-validate action="{{ url('categories', $category->id)}}">
				{{csrf_field()}}
				{{ method_field('PATCH') }}
                    <div class="form-group">
                        <label name="name" >Name:</label>
                        <input type="text" id="name" name="name" maxlength="255" value="{{$category->name}}" class="form-control input-lg" required="">
                    </div>
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Category :</label>
					<p> 
			            @if(!isset($category->name))
                    		{{""}}
                    	@else
                    	 	{{$category->name}}
                    	@endif


					 </p>
				</dl>
				<dl class="dl-horizontal">
					<label>Created At :</label>
					<p> {{date('j M , Y h:ia',strtotime($category->created_at))}} </p>
				</dl>		
				<dl class="dl-horizontal">
					<label>Last Update :</label>
					<p>{{date('j M , Y h:ia',strtotime($category->updated_at))}}</p>
				</dl>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{route('categories.index')}}" class="btn btn-danger btn-block">Cancel</a>
						
					</div>

					<div class="col-sm-6">
						 <input type="submit" value="Save" class="btn btn-block btn-success">
						
					</div>
				</div>
			</div>
         

		</div>
		</form>
	</div><!--end of row and form !-->

@endsection
@section('scripts')
	<script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>
@endsection