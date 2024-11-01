@extends('layouts.app')
@section('title', 'Create student')
@section('content')
<div class="d-flex align-items-center gap-4">
	<h1>Create student</h1>
</div>
<form class="container-md col-12 col-lg-8 mx-auto ms-lg-4 mt-4">
	@csrf
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="name">Name</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="name" id="name" value="{{ old('name') }}"></input>
		@if($errors->has("name"))
		<div class="text-danger mt-2">
			{{$errors->first('name')}}
		</div>
		@endif
	</div>
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="address">Address</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="address" id="address" value="{{ old('address') }}"></input>
		@if($errors->has("address"))
		<div class="text-danger mt-2">
			{{$errors->first('address')}}
		</div>
		@endif
	</div>
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="city_id">City</label>
		<select name="city_id" class="grow-1 col-md-6 p-1 m-0" id="city_id">
			<option value="" disabled>City</option>
		</select>
		@if($errors->has("city_id"))
		<div class="text-danger mt-2">
			{{$errors->first('city_id')}}
		</div>
		@endif
	</div>
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="phone">Phone Number</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="phone" id="phone" value="{{ old('phone') }}" placeholder="123-123-1234"></input>
		@if($errors->has("phone"))
		<div class="text-danger mt-2">
			{{$errors->first('phone')}}
		</div>
		@endif
	</div>
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="email">Email</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="email" id="email" value="{{ old('email') }}""></input>
		@if($errors->has(" email"))
			<div class="text-danger mt-2">
		{{$errors->first('email')}}
	</div>
	@endif
	</div>
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="birthday">Birthday</label>
		<input type="date" class="grow-1 col-md-6 p-1 m-0" name="birthday" id="birthday" value="{{ old('birthday') }}""></input>
		@if($errors->has(" birthday"))
			<div class="text-danger mt-2">
		{{$errors->first('birthday')}}
	</div>
	@endif
	</div>

	<button class="btn btn-warning btn-sm mt-3">Save</button>
</form>
@endsection