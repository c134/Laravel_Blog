@extends('app')
@section('content')
    <h1>{{$article->title}}</h1>
    <hr/>
    <article>
        <img src="{{asset($article->image_path)}}" alt="{{$article->title}}">

        <p>{{$article->body}}</p>
    </article>
    <a href="{{action('ArticlesController@index')}}">
        <button class="btn btn-default">Back to articles</button>
    </a>
    <a href="{{action("ArticlesController@edit", [$article->id])}}" style="text-decoration: none">
        <button class="btn btn-default">Edit article</button>
    </a>
@stop