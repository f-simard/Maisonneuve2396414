@extends('layouts.app')
@section('title', @trans('Upload File'))
@section('content')
<div class="d-flex align-items-center gap-4">
	<h1>@lang('Upload File')</h1>
</div>
@if(!$errors->isEmpty())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<form class="container-md col-12 col-lg-8 mx-auto ms-lg-4 mt-4" method="post" enctype="multipart/form-data">
	@csrf
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="title_en">@lang('English Title')</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="title_en" id="title_en" value="{{ old('title_en') }}"></input>
	</div>
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="title_fr">@lang('French Title')</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="title_fr" id="title_fr" value="{{ old('title_fr') }}"></input>
	</div>
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="file">@lang('File')</label>
		<input type="file" class="grow-1 col-md-6 p-1 m-0" name="file" id="file" value="{{ old('file') }}"></input>
	</div>

	<button class="btn btn-warning mt-3">@lang('Upload')</button>
</form>
@endsection