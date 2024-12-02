@extends('layouts.app')
@section('title', @trans('Article'))
@section('content')
@php
$locale = app()->getLocale();
@endphp
<div class="d-sm-flex align-items-center gap-4">
	@if(isset($article->title[$locale]))
	<h1>{{ $article->title[$locale] }}</h1>
	@elseif(isset($article->title['en']))
	<h1>{{ $article->title['en'] }}</h1><span class="badge text-bg-secondary ms-1">{{ $article->lang_badge }}</span>
	@elseif(isset($article->title['fr']))
	<h1>{{ $article->title['fr'] }}</h1><span class="badge text-bg-secondary ms-1">{{ $article->lang_badge }}</span>
	@endif
</div>
@if($article->user_id === Auth::user()->id)
<div class="btn-group" role="group" aria-label="Basic example">
	<a href="{{ route('article.edit', $article->id) }}" class="btn btn-outline-warning btn-sm">@lang('Edit')</a>
	<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteArticle">
		@lang('Delete')
	</button>
</div>
@endif

<div class="container-md col-12 col-lg-6 mx-auto ms-lg-4 mt-4">
	<div class="container-lg mt-2">
		<p class="text-body-secondary">@lang('Written by') {{ $article->user->student->name }}</p>
		@if(isset($article->content[$locale]))
		<p>{{ $article->content[$locale] }}</p>
		@elseif(isset($article->content['en']))
		<p>{{ $article->content['en'] }}</p>
		@elseif(isset($article->content['fr']))
		<p>{{ $article->content['fr'] }}</p>
		@endif
	</div>
	<!-- Button trigger modal -->
</div>


<!-- Modal -->
<div class="modal fade" id="deleteArticle" tabindex="-1" aria-labelledby="deleteArticleModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="deleteArticleModal">@lang('Confirm')</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				@lang('Confirm article delete') {{$article->id}}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Cancel')</button>
				<a href="{{(route('article.destroy', $article->id))}}" type="button" class="btn btn-danger">@lang('Delete')</a>
			</div>
		</div>
	</div>
</div>
@endsection