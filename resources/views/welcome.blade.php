@extends('layouts.app')
@section('title', trans('Welcome'))
@section('content')
<div class="row justify-content-center mt-5 mb-5">
	<section class="col-md-8">
		<h1>
			@lang('Welcome')
		</h1>
		<p class="mt-3">
			@lang('Welcome_Paragraph')
		</p>
		<div class="mt-4">
			<a href="{{ route('login') }}" class="btn btn-warning">@lang('Login')</a>
			<a href="{{ route('student.create') }}" class="btn btn-outline-warning">@lang('Register')</a>
		</div>
	</section>
</div>
@endsection