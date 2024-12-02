@extends('layouts.app')
@section('title', @trans('Student List'))
@section('content')
<div class="container-md">
	<h1>@lang('Student List')</h1>
	@if(count($students) > 0)
	<table class="table table-striped mt-3">
		<thead class="table-dark text-bg-dark">
			<th>@lang('ID')</th>
			<th>@lang('Complete_name')</th>
			<th>@lang('Actions')</th>
		</thead>
		<tbody>
			@foreach($students as $student)
			<tr>
				<td class="col-md-2">{{$student->id}}</td>
				<td class="col-md-8">{{$student->name}}</td>
				<td class="col-ms-2">
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="{{ route('student.show', $student->id) }}" class="btn btn-warning">@lang('View')</a>
						<a href="{{ route('student.edit', $student->id) }}" class="btn btn-outline-warning">@lang('Edit')</a>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination justify-content-center">
		{{$students}}
	</div>

	@else
	<div class="alert alert-secondary" role="alert">
		<p>@lang('No registered student')</p>
	</div>
	@endif
</div>
@endsection