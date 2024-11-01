@extends('layouts.app')
@section('title', 'Student List')
@section('content')
<div class="mt-5">
	<div class="d-flex align-items-center gap-4">
		<h1>{{$student->name}}</h1>
		<a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
	</div>
	<div class="container-md col-12 col-lg-6 mx-auto ms-lg-4 mt-4">
		<div class="container-md d-flex align-items-center justify-content-between flex-wrap bg-light bg-gradient">
			<p class="p-1 m-0">ID</p>
			<p class="p-1 m-0">{{$student->id}}</p>
		</div>
		<div class="container-lg d-flex justify-content-between flex-wrap mt-2">
			<p class="p-1 m-0">Name</p>
			<p class="p-1 m-0">{{$student->name}}</p>
		</div>
		<div class="container-md d-flex align-items-center justify-content-between flex-wrap bg-light bg-gradient">
			<p class="p-1 m-0">Address</p>
			<p class="p-1 m-0">{{$student->address}}</p>
		</div>
		<div class="container-md d-flex justify-content-between flex-wrap mt-2">
			<p class="p-1 m-0">City</p>
			<p class="p-1 m-0">{{$student->city}}</p>
		</div>
		<div class="container-md d-flex align-items-center justify-content-between flex-wrap bg-light bg-gradient">
			<p class="p-1 m-0">Phone number</p>
			<p class="p-1 m-0">{{$student->phone}}</p>
		</div>
		<div class="container-md d-flex justify-content-between flex-wrap mt-2">
			<p class="p-1 m-0">Email</p>
			<p class="p-1 m-0">{{$student->email}}</p>
		</div>
		<div class="container-md d-flex align-items-center justify-content-between flex-wrap bg-light bg-gradient">
			<p class="p-1 m-0">Birthday</p>
			<p class="p-1 m-0">{{$student->birthday}}</p>
		</div>
	</div>
</div>
@endsection