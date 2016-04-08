
@extends('app')

@section('content')

    <h1>Write a new article</h1>

    {!! Form::model( $articleEdit ,['method' => 'PATCH', 'action' => ['ArtclesController@update', $articleEdit->id]]) !!}
    <div class = "form-group">
        {!! Form::label('title', 'Title:=') !!}
        {!! Form::text('title', null, ['class' => 'form-control'] ) !!}
    </div>

    <div class = 'form-group'>
        {!! Form::label('body', 'Body:=') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control'] ) !!}
    </div>

    <div class = 'form-group'>
        {!! Form::label('published_at', 'published_at') !!}
        {!! Form::input('date','published_at', date('m-d-y'), ['class' => 'form-control'] ) !!}
    </div>

    <div class = 'form-group'>

        {!! Form::submit('update Article', ['class' => 'btn btn-primary form-control'] ) !!}
    </div>
    {!! Form::close() !!}

    @if($errors->any())
        {
        <ul class = "alert alert-danger" >
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach()
        </ul>
        }
    @endif

@stop