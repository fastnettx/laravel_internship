@extends('layout.layout')

@section('title', 'Page View')

@section('content')
    <h1> List of articles </h1>
    <div class="container">
        <table>
            @foreach ($posts as $row)
                <tr>
                    <td>
                        <a href="{{route('posts.id', ['id'=>$row->id])}}">{{ $row->title }} </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('bottom')
<h3> <a href="/"> To main </a></h3>
@endsection


