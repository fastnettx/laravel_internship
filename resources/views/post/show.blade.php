@extends('layouts.app')
@section('title', 'detail')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2> {{ $post->title}} </h2>
                    </div>
                    <div class="card-body">
                         {{ $post->text }}</br>
                        <br> Date created - {{ $post_create}} </br>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('bottom')
    <h3><a href="/home/view"> To view </a></h3>
@endsection
