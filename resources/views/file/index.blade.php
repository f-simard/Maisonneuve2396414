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
					@if($file->user_id === Auth::user()->id)
					<div class="btn-group mt-2" role="group" aria-label="Basic example">
						<a href="{{ route('file.edit', $file->id) }}" class="btn btn-outline-warning">@lang('Edit')</a>
						<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteFile">
							@lang('Delete')
						</button>
					</div>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination justify-content-center">
		{{$files}}
	</div>

	<!-- Modal -->
	<div class="modal fade" id="deleteFile" tabindex="-1" aria-labelledby="deleteFileModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="deleteFileModal">@lang('Confirm')</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					@lang('Confirm file delete') ({{$file->id}})
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Cancel')</button>
					<a href="{{(route('file.destroy', $file->id))}}" type="button" class="btn btn-danger">@lang('Delete')</a>
				</div>
			</div>
		</div>
	</div>

	@else
	<div class="alert alert-secondary" role="alert">
		<p>@lang('No files uploaded')</p>
	</div>
	@endif
</div>
@endsection