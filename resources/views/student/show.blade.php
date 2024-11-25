@extends('layouts.app')
@section('title', @trans('Student'))
@section('content')
<div class="d-sm-flex align-items-center gap-4">
	<h1>{{$student->name}}</h1>
	<a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">@lang('Edit')</a>
</div>
<div class="container-md col-12 col-lg-6 mx-auto ms-lg-4 mt-4">
	<div class="container-lg d-sm-flex align-items-center justify-content-between mt-2 bg-light bg-gradient">
		<p class="p-1 m-0">@lang('ID')</p>
		<p class="p-1 m-0">{{$student->id}}</p>
	</div>
	<div class="container-lg d-sm-flex flex-md-row align-items-center justify-content-between mt-2">
		<p class="p-1 m-0">@lang('Complete_name')</p>
		<p class="p-1 m-0">{{$student->name}}</p>
	</div>
	<div class="container-lg d-sm-flex flex-md-row align-items-center justify-content-between mt-2 bg-light bg-gradient">
		<p class="p-1 m-0">@lang('Address')</p>
		<p class="p-1 m-0">{{$student->address}}</p>
	</div>
	<div class="container-lg d-sm-flex align-items-center justify-content-between mt-2">
		<p class="p-1 m-0">@lang('City')</p>
		<p class="p-1 m-0">{{$student->city->name}}</p>
	</div>
	<div class="container-lg d-sm-flex flex-md-row align-items-center justify-content-between mt-2 bg-light bg-gradient">
		<p class="p-1 m-0">@lang('Phone')</p>
		<p class="p-1 m-0">{{$student->phone}}</p>
	</div>
	<div class="container-lg d-sm-flex flex-md-row align-items-center justify-content-between mt-2">
		<p class="p-1 m-0">@lang('Email')</p>
		<p class="p-1 m-0">{{$student->user->email}}</p>
	</div>
	<div class="container-lg d-sm-flex flex-md-row align-items-center justify-content-between mt-2 bg-light bg-gradient">
		<p class="p-1 m-0">@lang('Birthdate')</p>
		<p class="p-1 m-0">{{$student->birthday}}</p>
	</div>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-outline-danger mt-4" data-bs-toggle="modal" data-bs-target="#deleteStudent">
		@lang('Delete')
	</button>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteStudent" tabindex="-1" aria-labelledby="deleteStudentModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="deleteStudentModal">@lang('Confirm')</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				@lang('Confirm student delete') {{$student->name}} ({{$student->id}})
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				<a href="{{(route('student.destroy', $student->id))}}" type="button" class="btn btn-danger">@lang('Delete')</a>
			</div>
		</div>
	</div>
</div>
@endsection