
@extends('app')

@section('content')

    <h1>Write a new article</h1>

    {!! Form::open(['url' => 'articles']) !!}

    {!! Form::hidden('user_id','1') !!}
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
        {!! Form::label('Tags', 'Tags') !!}
        {!! Form::select('Tags',$tag , null, ['class' => 'form-control', 'multiple'] ) !!}
    </div>

    <div class = 'form-group'>

        {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control'] ) !!}
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