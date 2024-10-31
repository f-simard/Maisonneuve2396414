@extends('layouts.app')
@section('title', 'StudentList')
@section('content')
<div class="container-md mt-3">
	<h1>Student List</h1>
	@if(count($students) > 0)
	<table class=" table table-striped mt-3">
		<thead class="table-dark text-bg-dark">
			<th>ID</th>
			<th>Name</th>
			<th>Link</th>
		</thead>
		<tbody>
			@foreach($students as $student)
			<tr>
				<td class="col-2">{{$student->id}}</td>
				<td class="col-8">{{$student->name}}</td>
				<td class="col-2">Edit</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination justify-content-center">
		{{$students}}
	</div>

	@else
	<div class="alert alert-secondary" role="alert">
		<p>No student registered</p>
	</div>
	@endif
</div>
@endsection