@extends('app')

@section('content')
    <script src="//cdn.jsdelivr.net/editor/0.1.0/editor.js"></script>
    <script src="//cdn.jsdelivr.net/editor/0.1.0/marked.js"></script>
    <script src="/js/previewer.js"></script>

    <div class="article-submission">
        <section class="section-header">
            <h3 class="section-title">Submit an article</h3>
        </section>

        {!! Form::open(['url' => route('article.store'), 'id' => 'createArticle']) !!}
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

    <script type="text/javascript">
        var editor = new Editor({
            element: $('#content').get(0)
        });

        var previewer = new Previewer($('#createArticle'), editor);
    </script>

    <div class="article-preview">
        <section class="section-header">
            <h3 class="section-title">Article preview</h3>
        </section>

        <div class="article">
            <article>
                <header>
                    <div class="article-meta">
                        <span class="category"></span>
                    </div>

                    <h1 id="articleTitle"></h1>
                </header>

                <div class="excerpt" id="articleExcerpt"></div>

                <div id="articleContent"></div>
            </article>
        </div>
    </div>
@endsection
