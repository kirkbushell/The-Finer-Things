<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>The Finer Things - Articles, reviews and interviews regarding Wine, Cigars, Scotch/Whisky, Cafes/Restaurants...</title>

	<link href="/css/styles.dev.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Noto+Sans|Montserrat|Dancing+Script' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<section id="header">
		<h2>The Finer Things.</h2>
		<div class="description">
			Articles & reviews on cigars, wine, scotch & whisky
		</div>
	</section>

	<section id="nav">
		<a href="{{ route('home') }}">Home</a>
		<a href="">Cigars</a>
		<a href="">Wines</a>
		<a href="">Whisky / Scotch</a>
		<a href="{{ route('article.create') }}"{!! Request::segment(1) == 'submit' ? ' class="active"' : '' !!}>Submit an article</a>
	</section>

	<section id="main">
		<div class="content">
			@yield('content')
		</div>
	</section>
</body>
</html>
