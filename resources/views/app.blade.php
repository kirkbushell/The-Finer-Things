<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>The Finer Things - Articles, reviews and interviews regarding Wine, Cigars, Scotch/Whisky, Cafes/Restaurants...</title>

	<link href="/css/styles.{!! app()->environment() == 'production' ? 'min' : 'dev' !!}.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Noto+Sans|Montserrat|Dancing+Script' rel='stylesheet' type='text/css'>
	<script src="/js/jquery-1.11.2.min.js"></script>
	<script src="/js/scripts.{!! app()->environment() == 'production' ? 'min' : 'dev' !!}.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<section id="header">
		<div class="container">
			<h2><a href="{!! route('home') !!}">The Finer Things.</a></h2>
			<div class="description">
				Articles & reviews on cigars, wine, scotch & whisky
			</div>

			<div class="account-box">
				@if (Auth::check())
					<div class="user">
						{{  Auth::user()->name }} <span class="separator">|</span> <a href="/auth/logout">Logout</a>
					</div>
				@else
					Have an account? <a href="/auth/login">Login</a>.
				@endif
			</div>
		</div>
	</section>

	@include('layout.menu')

	<section id="main">
		<div class="content">
			@yield('content')
		</div>
	</section>
</body>
</html>
