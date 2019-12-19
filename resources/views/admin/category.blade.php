 
@extends('layout.app')

@section('content')

	<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="container">
		<h1 class="mb-5">Category Lists</h1>
		 	<ul class="list-group">
				@foreach($cats as $cat)
					<li class="list-group-item">
						{{$cat->name}} 
						<a href="{{url('delete/'.$cat->id)}}" class="btn btn-danger float-right">Delete</a>
					</li>
				@endforeach
			</ul>
				<br><br>
				<h2 class="text-align-left">Create New Category</h2>
				 <form method="POST" action="{{ url('/storecat')}}" >
					{{ csrf_field()}}
					<div class="form-group">
						<input type="text" name="name" class="form-control">
					</div>
					<button class="btn btn-primary"  type="submit" >Create</button>
				 </form>
			 
		</div>
		</div>
	</div>

	@endsection
