@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')

	<div class="panel panel-default">
		<div class="panel-heading">
			Edit post : {{ $post->title }}
		</div>

		<div class="panel-body">
			<form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">
						Title
					</label>
					<input class="form-control" type="text" name="title" value="{{ $post->title }}" autocomplete="off"></input>
				</div>
				<div class="form-group">
					<label for="featured">
						Featured Image
					</label>
					<input class="form-control" type="file" name="featured" autocomplete="off"></input>
				</div>
				<div class="form-group">
					<label for="category">
						Select a category
					</label>

					<select class="form-control" name="category_id" id="category">
						@foreach($categories as $category)
							<option value="{{ $category->id }}"
							@if($post->category->id == $category->id)
								selected
							@endif
							>{{ $category->name }}</option>
						@endforeach
					</select>

				</div>
				<div class="form-group">
					<label for="tags">Select tags</label>
					@foreach($tags as $tag)
						<div class="checkbox">
							<label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"

								@foreach($post->tags as $t)
									@if($tag->id == $t->id)
										checked
									@endif
								@endforeach
								>{{ $tag->tag }}</label>
						</div>
					@endforeach
				</div>
				<div class="form-group">
					<label for="content">
						Content
					</label>
					<textarea class="form-control" name="content" id="summernote" cols="5" rows="5" autocomplete="off">{{ $post->content }}</textarea>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">
							Update post
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('styles')
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@endsection

@section('javascript')
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote();
        });
	</script>
@endsection