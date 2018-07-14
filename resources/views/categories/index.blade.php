@extends('main')

@section('title' , ' | Categories ')

@section('content')
	

	<div class="row">
		<div class="col-md-7 ">
			<h1>Categories</h1>
			<hr>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Edit & Delete</th>
					</tr>
				</thead>
				<tbody>

					@foreach($categories as $category)

						<tr>
							<th>{{$category->id}}</th>
							<td>{{$category->name}}</td>
							<td>
								<form method="post" action="{{url('categories',$category->id)}}">
			            			{{csrf_field()}}
			            			<input name="_method" type="hidden" value="DELETE">
			            			<a href="{{ route('categories.edit', ['Edit' => $category->id])}}" class="btn btn-sm btn-primary">
									<span class="glyphicon glyphicon-edit"></span>
									</a>
									<button type="submit" class="btn btn-sm btn-danger">
										<span class="glyphicon glyphicon-trash"></span>
									</button>
									
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of col-md-8 div !-->
		<div class="col-md-4 ">
			<div class="well">
				<h2>Add Category</h2>
				<hr>
				<form method="post" data-parsley-validate action="{{ url('categories') }}">
					{{csrf_field()}}
	                    <div class="form-group">
	                        <label name="name" >Name:</label>
	                        <input type="text" id="name" name="name" maxlength="255" placeholder="Name" class="form-control" required="">
	                    </div>
	                    <div class="form-group text-center">
	                    	<input type="submit" value="Create New Category" class="btn btn-block btn-success">
	                	</div>
	            </form>
			</div>
			
		</div>
	</div>
@endsection