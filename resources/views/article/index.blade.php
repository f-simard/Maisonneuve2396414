@extends('layouts.app')
@section('title', @trans('All Articles'))
@section('content')
@php
$locale = app()->getLocale();
@endphp
<div class="container-md">
	<h1>@lang('Articles List')</h1>
	@if(count($articles) > 0)
	<table class="table table-striped mt-3">
		<thead class="table-dark text-bg-dark">
			<th>@lang('Title')</th>
			<th>@lang('Author')</th>
		</thead>
		<tbody>
			@foreach($articles as $article)
			<tr>
				@if(!isset($article->title[$locale]))
				<td class="col-md-8"><a href="{{ route('article.show', $article->id) }}" class="">@lang('Missing Title Summary')</a></td>
				@else
				<td class="col-md-8"><a href="{{ route('article.show', $article->id) }}">{{ $article->title[$locale] }}</a></td>
				@endif
				<td class="col-md-4">{{ $article->user->student->name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination justify-content-center">
		{{$articles}}
	</div>

	@else
	<div class="alert alert-secondary" role="alert">
		<p>@lang('No articles to read')</p>
	</div>
	@endif
</div>
@endsection