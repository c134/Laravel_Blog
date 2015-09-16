@extends('app')
@section('content')
    <h1>Edit: {!! $article->title !!}</h1>

    {!! Form::model($article,['method'=>'PATCH', 'url'=>'articles/'.$article->id ])!!}
    @include('articles.form',['submitButtonText' => 'Update Article'])

    {!! Form::close() !!}

    {!! Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'DELETE']) !!}
    {!! Form::submit('Delete', ['class'=> 'btn btn-danger']) !!}
    {!! Form::close() !!}
    <a href="{{action('ArticlesController@index')}}" style="text-decoration: none">
        <button class="btn btn-default">Back to articles</button>
    </a>
    @include('errors.list')
@stop