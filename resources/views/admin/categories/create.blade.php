@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')

	<div class="panel panel-default">
		<div class="panel-heading">
			Crete new category
		</div>

		<div class="panel-body">
			<form action="{{ route('category.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">
						Name
					</label>
					<input class="form-control" type="text" name="name" autocomplete="off"></input>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Store Category</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection