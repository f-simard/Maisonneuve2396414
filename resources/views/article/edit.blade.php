@extends('layouts.app')
@section('title', @trans('Edit article'))
@section('content')
<div class="d-flex align-items-center gap-4">
	<h1>@lang('Modify an article')</h1>
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
<form class="container-md col-12 col-lg-8 mx-auto ms-lg-4 mt-4" method="post">
	@csrf
	<nav>
		<div class="nav nav-tabs" id="nav-tab" role="tablist">
			<button class="nav-link active" id="fr-tab" data-bs-toggle="tab" data-bs-target="#nav-fr" type="button" role="tab" aria-controls="nav-fr" aria-selected="true">@lang('French')</button>
			<button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#nav-en" type="button" role="tab" aria-controls="nav-en" aria-selected="false">@lang('English')</button>
		</div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="en-tab" tabindex="0">
			<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
				<label class="p-1 m-0" for="title_en">@lang('Title')</label>
				<input type="text" class="grow-1 col-md-6 p-1 m-0" name="title_en" id="title_en" value="{{ old('title_en', isset($article->title['en']) ? $article->title['en'] : '') }}"></input>
			</div>
			<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
				<label class="p-1 m-0" for="content_en">@lang('Content')</label>
				<textarea class="grow-1 col-md-6 p-1 m-0" name="content_en" id="content_en">{{ old('content_en', isset($article->content['en']) ? $article->content['en'] : '') }}</textarea>
			</div>
		</div>
		<div class="tab-pane fade show active" id="nav-fr" role="tabpanel" aria-labelledby="fr-tab" tabindex="0">
			<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
				<label class="p-1 m-0" for="title_fr">@lang('Title')</label>
				<input type="text" class="grow-1 col-md-6 p-1 m-0" name="title_fr" id="title_fr" value="{{ old('title_fr', isset($article->title['fr']) ? $article->title['fr'] : '') }}"></input>
			</div>
			<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
				<label class="p-1 m-0" for="content_fr">@lang('Content')</label>
				<textarea class="grow-1 col-md-6 p-1 m-0" name="content_fr" id="content_fr">{{ old('content_fr', isset($article->content['fr']) ? $article->content['fr'] : '') }}</textarea>
			</div>
		</div>
	</div>
	<button class="btn btn-warning mt-3">@lang('Post')</button>
</form>
@endsection