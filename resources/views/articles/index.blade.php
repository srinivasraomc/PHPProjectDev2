
@extends('app')

@section('content')
    <h1> Hello</h1>

        @foreach($article as $Art)
             <a href="/articles/{{$Art->id}}"> <h2>{{$Art->title }}</h2></a>
            <h3>{{$Art->body }}</h3>
            <h3>{{$Art->published_at }}</h3>
        @endforeach
@stop

