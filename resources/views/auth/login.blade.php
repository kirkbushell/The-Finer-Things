@extends('app')

@section('content')
	<div class="content-area">
		<section class="section-header">
			<h3 class="section-title">Login</h3>
		</section>

		{!! Form::open(['url' => route('article.store'), 'id' => 'createArticle']) !!}
			{!! Form::hidden('_token', csrf_token()) !!}
			<ul class="form">
				<li class="form-field horizontal">
					<div class="label">{!! Form::label('email') !!}</div>
					<div class="field">
						{!! Form::text('email') !!}
					</div>
				</li>
				<li class="form-field horizontal">
					<div class="label">{!! Form::label('password') !!}</div>
					<div class="field">
						{!! Form::password('password') !!}
					</div>
				</li>
				<li class="form-field horizontal">
					<div class="label">&nbsp;</div>
					<div class="field">
						{!! Form::checkbox('remember') !!} {!! Form::label('remember', 'Remember me') !!}
					</div>
				</li>
			</ul>
			<div class="buttons">
				{!! Form::submit('Login') !!} &nbsp; <a href="/password/email">Forgot Your Password?</a>
			</div>
		{!! Form::close() !!}
	</div>
@endsection
