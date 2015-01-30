@extends('app')

@section('content')
    <div class="content-area">
        <section class="section-header">
            <h3 class="section-title">Submit an article</h3>
        </section>

        {!! Form::open(['url' => route('article.store')]) !!}
            <ul class="form">
                <li class="form-field horizontal">
                    <div class="label">{!! Form::label('category') !!}</div>
                    <div class="field">
                        {!! Form::select('category', ['' => 'Select']) !!}
                        <div class="hint">Select an appropriate category.</div>
                    </div>
                </li>
                <li class="form-field horizontal">
                    <div class="label">{!! Form::label('title') !!}</div>
                    <div class="field">
                        {!! Form::text('title') !!}
                        <div class="hint">Enter a title that accurately describes your article.</div>
                    </div>
                </li>
                <li class="form-field horizontal">
                    <div class="label">{!! Form::label('excerpt') !!}</div>
                    <div class="field">
                        {!! Form::textarea('excerpt', null, ['rows' => '4']) !!}
                        <div class="hint">Provide an excerpt that gives a short paragraph detailing your article.</div>
                    </div>
                </li>
                <li class="form-field horizontal">
                    <div class="label">{!! Form::label('content') !!}</div>
                    <div class="field">
                        {!! Form::textarea('content') !!}
                        <div class="hint">
                            Your article should be engaging, include descriptive content and accurately
                            represent your views of your subject matter.
                        </div>
                    </div>
                </li>
                <li class="form-field horizontal">
                    <div class="label">&nbsp;</div>
                    <div class="field">
                        <div class="info">* All fields are required.</div>
                    </div>
                </li>
            </ul>

            <div class="buttons">
                {!! Form::submit('Submit your article') !!}
            </div>
        {!! Form::close() !!}
    </div>

    <div class="sidebar">
        @include('partials.categories')
    </div>
@endsection
