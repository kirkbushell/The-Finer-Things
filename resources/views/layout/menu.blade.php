<section id="nav">
    <a href="{{ route('home') }}"{!! Request::segment(1) == '' ? ' class="active"' : '' !!}>Home</a>
    <a href="">Cigars</a>
    <a href="">Wines</a>
    <a href="">Whisky / Scotch</a>
    <a href="{{ route('article.create') }}"{!! Request::segment(1) == 'submit' ? ' class="active"' : '' !!}>Submit an article</a>
    @if (!Auth::check())
        <a href="/auth/register"{!! Request::segment(1) == 'auth' && Request::segment(2) == 'register' ? ' class="active"' : '' !!}>Register</a>
    @endif
</section>