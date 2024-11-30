@extends('layouts.app')
@section('title', @trans('Article'))
@section('content')
<div class="d-flex align-items-center gap-4">
	<h1>@lang('Write an article')</h1>
</div>
<form class="container-md col-12 col-lg-8 mx-auto ms-lg-4 mt-4" method="post">
	@csrf
	<nav>
		<div class="nav nav-tabs" id="nav-tab" role="tablist">
			<button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-en" aria-selected="true">@lang('English')</button>
			<button class="nav-link" id="fr-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-fr" aria-selected="false">@lang('French')</button>
		</div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade show active" id="nav-en" role="tabpanel" aria-labelledby="en-tab" tabindex="0">
			<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
				<label class="p-1 m-0" for="name">@lang('Title')*</label>
				<input type="text" class="grow-1 col-md-6 p-1 m-0" name="name" id="name" value="{{ old('title_en') }}"></input>
			</div>
			@if($errors->has("title_en"))
			<div class="text-danger mt-2">
				{{$errors->first('title_en')}}
			</div>
			@endif
			<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
				<label class="p-1 m-0" for="address">@lang('Content')*</label>
				<textarea class="grow-1 col-md-6 p-1 m-0" name="address" id="address">{{ old('content_en') }}</textarea>
			</div>
			@if($errors->has("content_en"))
			<div class="text-danger mt-2">
				{{$errors->first('content_en')}}
			</div>
			@endif
		</div>
		<div class="tab-pane fade" id="nav-fr" role="tabpanel" aria-labelledby="fr-tab" tabindex="0">
			<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
				<label class="p-1 m-0" for="name">@lang('Title')*</label>
				<input type="text" class="grow-1 col-md-6 p-1 m-0" name="name" id="name" value="{{ old('title_fr') }}"></input>
			</div>
			@if($errors->has("title_fr"))
			<div class="text-danger mt-2">
				{{$errors->first('title_fr')}}
			</div>
			@endif
			<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
				<label class="p-1 m-0" for="address">@lang('Content')*</label>
				<textarea class="grow-1 col-md-6 p-1 m-0" name="address" id="address">{{ old('content_fr') }}</textarea>
			</div>
			@if($errors->has("content_fr"))
			<div class="text-danger mt-2">
				{{$errors->first('content_fr')}}
			</div>
			@endif
		</div>
	</div>
	<button class="btn btn-warning mt-3">@lang('Post')</button>
</form>
@endsection