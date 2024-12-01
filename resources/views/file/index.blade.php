@extends('layouts.app')
@section('title', @trans('File List'))
@section('content')
@php
$locale = app()->getLocale();
@endphp
<div class="container-md">
	<h1>@lang('File List')</h1>
	@if(count($files) > 0)
	<table class="table table-striped mt-3">
		<thead class="table-dark text-bg-dark">
			<th>@lang('Title')</th>
			<th>@lang('Author')</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach($files as $file)
			<tr>
				@if(!isset($file->name[$locale]))
				<td class="col-md-8">@lang('Missing Title Summary')</td>
				@else
				<td class="col-md-8">{{ $file->name[$locale] }}</a></td>
				@endif
				<td class="col-md-4">{{ $file->user->student->name }}</td>
				<td>
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="{{ asset('storage/' . $file->path) }}" target="_blank" class="btn btn-outline-warning">@lang('View')</a>
						<a href="{{ asset('storage/' . $file->path) }}" download class="btn btn-outline-warning">@lang('Download')</a>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination justify-content-center">
		{{$files}}
	</div>

	@else
	<div class="alert alert-secondary" role="alert">
		<p>@lang('No files uploaded')</p>
	</div>
	@endif
</div>
@endsection