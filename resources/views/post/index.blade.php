@extends('layouts.app')
@section('title', 'Page View')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Blogs list:
                    </div>

                    @foreach ($posts as $row)
                        <div class="card-body">
                            <h4>
                            <a href="{{route('post.show', ['id'=>$row->id])}}">{{ $row->title }} </a>
                            </h4>
                        </div>
                        <div>
                            {{ $row->short_text }} <a href="{{route('post.show', ['id'=>$row->id])}}">... </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{ $posts->onEachSide(3)->links() }}
    </div>

@endsection



