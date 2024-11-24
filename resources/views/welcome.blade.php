@extends('layouts.app')
@section('title', 'Student List')
@section('content')
<div class="row justify-content-center mt-5 mb-5">
	<section class="col-md-8">
		<h1>
			Welcome
		</h1>
		<p class="mt-3">
			Please log in or create an account to benefit to benefit from the site content.
		</p>
		<div class="mt-4">
			<a href="{{ route('login') }}" class="btn btn-warning">Login</a>
			<a href="{{ route('student.create') }}" class="btn btn-outline-warning">Create account</a>
		</div>
	</section>
</div>
@endsection