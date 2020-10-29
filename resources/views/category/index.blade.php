@extends('layouts.app')
@section('title', 'Page View')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Category list:
                    </div>

                    @foreach ($categories as $category)
                        <div class="card-body">
                            <h4>
                                <a href="{{route('category.show', ['id'=>$category->parent_id])}}">{{ $category->name }} </a>
                            </h4>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection



