@extends('app')
@section('content')
    <h1>Articles</h1>
    <hr/>
    @foreach($articles as $article)
        <article>
            <h2>
                <a href="{{action('ArticlesController@show', [$article->id])}}">{{$article->title}}</a>
            </h2>

            <div class="body">{{$article->body}}</div>
            {{$article->published_at}}
        </article>
    @endforeach
    <a href="{{action('ArticlesController@create')}}" >
        <button class="btn btn-default form-control" style="margin-top: 50px">Create Article</button>
    </a>
@stop