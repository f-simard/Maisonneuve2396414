@extends('layouts.app')
@section('title', @trans('Edit student'))
@section('content')
<div class="d-flex align-items-center gap-4">
	<h1>@lang('Edit Student')</h1>
</div>
<form class="container-md col-12 col-lg-8 mx-auto ms-lg-4 mt-4" method="post">
	@csrf
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="name">@lang('Complete_name')*</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="name" id="name" value="{{ old('name', $student->name) }}"></input>
	</div>
	@if($errors->has("name"))
	<div class="text-danger mt-2">
		{{$errors->first('name')}}
	</div>
	@endif
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="address">@lang('Address')*</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="address" id="address" value="{{ old('address', $student->address) }}"></input>
	</div>
	@if($errors->has("address"))
	<div class="text-danger mt-2">
		{{$errors->first('address')}}
	</div>
	@endif
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="city_id">@lang('City')*</label>
		<select name="city_id" class="grow-1 col-md-6 p-1 m-0" id="city_id">
			<option value="" disabled @if(!old('city_id')) selected @endif>@lang('Select a city')</option>
			@forelse($cities as $city)
			<option value="{{ $city->id }}" {{ old('city_id', $student->city_id) == $city->id ? 'selected' : '' }}>
				{{ $city->name }}
			</option>
			@empty
			<option value="">lang('No city available')</option>
			@endforelse
		</select>
	</div>
	@if($errors->has("city_id"))
	<div class="text-danger mt-2">
		{{$errors->first('city_id')}}
	</div>
	@endif
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="phone">@lang('Phone') (123-123-1234)</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="phone" id="phone" value="{{ old('phone', $student->phone) }}" placeholder="123-123-1234"></input>
	</div>
	@if($errors->has("phone"))
	<div class="text-danger mt-2">
		{{$errors->first('phone')}}
	</div>
	@endif
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="email">@lang('Email')</label>
		<input type="text" class="grow-1 col-md-6 p-1 m-0" name="email" id="email" value="{{ old('email', $student->user->email) }}"></input>
	</div>
	@if($errors->has("email"))
	<div class="text-danger mt-2">
		{{$errors->first('email')}}
	</div>
	@endif
	<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-md-4 mt-3">
		<label class="p-1 m-0" for="birthday">@lang('Birthdate')*</label>
		<input type="date" class="grow-1 col-md-6 p-1 m-0" name="birthday" id="birthday" value="{{ old('birthday', $student->birthday) }}"></input>
	</div>
	@if($errors->has("birthday"))
	<div class="text-danger mt-2">
		{{$errors->first('birthday')}}
	</div>
	@endif
	<button class="btn btn-warning mt-3">@lang('Save')</button>
	<a href="{{ route('student.show', $student->id) }}" class="btn btn-outline-danger mt-3">@lang('Cancel')</a>
</form>

@endsection