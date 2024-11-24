@extends('layouts.app')
@section('title', trans('Login'))
@section('content')
@if(!$errors->isEmpty())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row justify-content-center mt-5 mb-5">
	<div class="col-md-4">
		<section class="mb-4">
			<h1>@lang('Login')</h1>
		</section>
		<form method="POST">
			@csrf
			<div class="form-floating mb-3">
				<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="{{old('email')}}">
				<label for="floatingInput">@lang('Email')</label>
			</div>
			<div class="form-floating mb-3">
				<input type="password" class="form-control" id="floatingPassword" placeholder="Password" id="password" name="password">
				<label for="floatingPassword">@lang('Password')</label>
			</div>
			<button type="submit" class="btn btn-warning">@lang('Login')</button>
		</form>
	</div>
</div>
@endsection