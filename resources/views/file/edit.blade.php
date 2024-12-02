@extends('layouts.app')
@section('title', @trans('Edit file'))
@section('content')
<div class="d-flex align-items-center gap-4">
	<h1>@lang('Edit file')</h1>
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
		<label class="p-1 m-0" for="name_en">@lang('English Title')</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="name_en" id="name_en" value="{{ old('name_en', isset($file->name['en']) ? $file->name['en'] : '') }}"></input>
	</div>
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="name_fr">@lang('French Title')</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="name_fr" id="name_fr" value="{{ old('name_fr', isset($file->name['fr']) ? $file->name['fr'] : '') }}"></input>
	</div>
	<button class=" btn btn-warning mt-3">@lang('Post')</button>
</form>
@endsection