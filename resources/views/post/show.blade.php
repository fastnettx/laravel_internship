@extends('layout.layout')
@section('title', 'detail')
@section('content')
    <br class="container">
        <h2>Title :  {{ $id->title}} </h2>
         Body : {{ $id->body }}</br>
        <br> Date created - {{ $id->created_at }} </br>
        <br> Date updates - {{ $id->updated_at }} </br>
        <a href="{{route('posts.modify', ['id'=>$id->id])}}" class="btn"> Edit </a>
        <a href="{{route('posts.delete', ['id'=>$id->id])}}" class="btn"> Delete </a>

    </div>
@endsection
@section('bottom')
    <h3> <a href="/view"> To view </a></h3>
@endsection
