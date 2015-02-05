@extends('app')

@section('content')
	<div class="content-area">
		<section class="section-header">
			<h3 class="section-title">Register</h3>
		</section>

		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		{!! Form::open(['url' => '/auth/register']) !!}
			{!! Form::hidden('_token', csrf_token()) !!}
			<ul class="form">
				<li class="form-field horizontal">
					<div class="label">{!! Form::label('name') !!}</div>
					<div class="field">
						{!! Form::text('name', null, ['required']) !!}
					</div>
				</li>
				<li class="form-field horizontal">
					<div class="label">{!! Form::label('email') !!}</div>
					<div class="field">
						{!! Form::email('email', null, ['required']) !!}
					</div>
				</li>
				<li class="form-field horizontal">
					<div class="label">{!! Form::label('email_confirmation', 'Confirm') !!}</div>
					<div class="field">
						{!! Form::email('email_confirmation', null, ['required', 'data-parsley-equal-to' => '#email', 'placeholder' => 'Please confirm your email']) !!}
					</div>
				</li>
				<li class="form-field horizontal">
					<div class="label">{!! Form::label('password') !!}</div>
					<div class="field">
						{!! Form::password('password', null, ['required', 'data-parsley-equal-to' => '#email']) !!}
					</div>
				</li>
				<li class="form-field horizontal">
					<div class="label">{!! Form::label('password_confirmation', 'Confirm') !!}</div>
					<div class="field">
						{!! Form::password('password_confirmation', null, ['required', 'data-parsley-equal-to' => '#password', 'placeholder' => 'Please confirm your password']) !!}
					</div>
				</li>
			</ul>
			<div class="buttons">
				{!! Form::submit('Register') !!}
			</div>
		{!! Form::close() !!}

		<script type="text/javascript">
			$('form').parsley();
		</script>
	</div>
</div>
@endsection
