<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name') }} - @yield('title')</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body class="d-flex flex-column vh-100">
	<header>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark py-3 px-5" aria-label="nav">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{ route('welcome') }}"><i class="fa-brands fa-hive fa-xl"></i></a>
				<div class="collapse navbar-collapse" id="navbarsExample04">
					<ul class="navbar-nav me-auto mb-2 mb-md-0">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Students</a>
							<ul class="dropdown-menu">
								@auth
								<li><a class="dropdown-item" href="{{ route('student.index') }}">All</a></li>
								@endauth
								<li><a class="dropdown-item" href="{{ route('student.create') }}">Create</a></li>
							</ul>
						</li>
					</ul>
					<ul class="navbar-nav  mb-2 mb-sm-0">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
								aria-expanded="false">Langue</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">English</a></li>
								<li><a class="dropdown-item" href="#">French</a></li>
							</ul>
						</li>
						<li class="nav-item">
							@guest
							<a class="nav-link" href="{{ route('login') }}">@lang('Login')</a>
							@else
							<a class="nav-link" href="{{ route('logout') }}">@lang('Logout')</a>
							@endguest
						</li>
					</ul>
				</div>
				<button class="navbar-toggler" type="button " data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</nav>
	</header>
	<div class="container mt-5 flex-fill">
		@if(session('success'))
		<div class="mb-3 mt-3 alert alert-success alert-dismissible fade show" role="alert">
			{{ session('success') }}
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif
		@yield('content')
	</div>
	<footer class="py-3 my-4">
		<ul class="nav justify-content-center border-bottom pb-3 mb-3">
			<li class="nav-item"><a href="{{ route('student.index') }}" class="nav-link px-2 text-body-secondary">Students</a></li>
		</ul>
		<p class="text-center text-body-secondary">© 2024 Maisonneuve2396414, Inc</p>
	</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>