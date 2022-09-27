@extends('layouts.app')
@section('content')

<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<div class="content-header"></div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Add Article</h3>
					</div>
					<form method="post" action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ old('title') ? old('title') : $article->title }}">
								@error('title')
									<span class="invalid-feedback" role="alert" style="display: block">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="description">Short Description</label>
								<textarea id="short_description" name="short_description" class="form-control">{{ (old('short_description') ? old('short_description') : $article->short_description) }}</textarea>
								@error('short_description')
									<span class="invalid-feedback" role="alert" style="display: block">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea id="description" name="description">{{ (old('description') ? old('description') : $article->description) }}</textarea>
								@error('description')
									<span class="invalid-feedback" role="alert" style="display: block">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="upload-1">Image</label>
								<div class="image-section">
									<div class="input-group" id="image-1">
										<div class="custom-file">
											<input type="file" name="upload_image[]" class="custom-file-input" id="upload-1">
											<label class="custom-file-label" for="upload-1">Choose file</label>
										</div>
										<div class="input-group-append btn btn-success add-more">
											<span><i class="fa fa-plus"></i></span>
										</div>
									</div>
								</div>
								@if(count($article->get_upload_image) > 0)
									<div class="table-responsive mt-2">
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>Image Name</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($article->get_upload_image as $val)
													@php
													$name = explode('/', $val->image_name);
													$name = end($name);
													@endphp
													<tr>
														<td>
															<a href="{{ asset($val->image_name) }}" target="_blank">{{ $name }}</a>
														</td>
														<td>
															<a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="swal_delete('{{ route('article.delete-image', $val->id) }}')">
																<i class="fa fa-trash"></i>
															</a>
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								@endif
								@error('upload_image')
									<span class="invalid-feedback" role="alert" style="display: block">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="tags">Tags</label>
								<input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags') ? old('tags') : $article->tags }}" data-role="tagsinput" />
							</div>
						</div>
						<div class="card-footer">
							 <button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css">
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.1/js/bootstrapValidator.min.js"></script>

<script>
	$(function () {
		$('#description').summernote({
			height: 200
		});
		bsCustomFileInput.init();

		var image_count = 1;
		$('.add-more').on('click', function(){
			image_count++;
			$html = '<div class="input-group mt-3" id="image-'+image_count+'"> <div class="custom-file"> <input type="file" name="upload_image[]" class="custom-file-input" id="upload-'+image_count+'"> <label class="custom-file-label" for="upload-'+image_count+'">Choose file</label> </div> <div class="input-group-append btn btn-danger remove-row" data-id="'+image_count+'"> <span><i class="fa fa-trash"></i></span> </div> </div>';
			$('.image-section').append($html);
			bsCustomFileInput.init();
		});

		$(document).on('click', '.remove-row', function(){
			var row = $(this).attr('data-id');
			$('#image-'+row).remove();
		});
	});
</script>
<style type="text/css">
.label {
	display: inline;
	padding: 0.2em 0.6em 0.3em;
	font-size: 75%;
	font-weight: 700;
	line-height: 1;
	color: #fff;
	text-align: center;
	white-space: nowrap;
	vertical-align: baseline;
	border-radius: 0.25em;
}
.label-info {
	background-color: #5bc0de;
}
.bootstrap-tagsinput{
	width: 100%;
}
</style>
@endsection