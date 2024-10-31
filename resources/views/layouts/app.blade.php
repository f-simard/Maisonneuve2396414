<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name') }} - @yield('title')</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark py-3 px-5" aria-label="nav">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><i class="fa-brands fa-hive fa-xl"></i></a>
				<div class="collapse navbar-collapse" id="navbarsExample04">
					<ul class="navbar-nav me-auto mb-2 mb-md-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" aria-disabled="true">Disabled</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<button class="navbar-toggler" type="button " data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</nav>
	</header>
	<div class="container">
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
			<li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
			<li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
			<li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
			<li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
			<li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
		</ul>
		<p class="text-center text-body-secondary">© 2024 Company, Inc</p>
	</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>