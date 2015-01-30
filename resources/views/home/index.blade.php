@extends('app')

@section('content')
	<div class="content-area">
		<section class="section-header">
			<h3 class="section-title">Articles</h3>
		</section>

		<section class="articles">
			<article>
				<div class="image">
					<a href=""><img src="/img/examples/partagas-serie-e-2.jpg" alt=""></a>
				</div>
				<header>
					<div class="article-meta">
						<a href="">Cigars</a> \
						2 days ago \
						<a href="">3 comments</a>
					</div>
					<h1><a href="">Partagas Serie E No. 2</a></h1>
				</header>
				<div class="entry">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
					labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
					nisi ut aliquip ex ea commodo consequat.</p>

					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
						pariatur.</p>
				</div>
			</article>
		</section>
	</div>

	<div class="sidebar">
		@include('partials.categories')
	</div>
@endsection
