
@extends('app')

@section('content')
    <h1> Hello show</h1>
     <h2>{{$articleid->title }}</h2>
    <h3>{{$articleid->body }}</h3>
    <h3>{{$articleid->published_at }}</h3>
@stop

