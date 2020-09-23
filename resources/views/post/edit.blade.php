@extends('layout.layout')
@section('title', 'detail')
@section('content')
    <form method="POST" action="{{ route('posts.update', ['id' => $post->id])}}">
        {!! csrf_field() !!}
        <input name="_method" type="hidden" value="PUT">
        <table>
            <tr>
                <td>
                    <label for="title">Title</label>
                </td>
                <td>
                    <input name="title" type="text" class="form-control" value="{{ $post->title }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="body">Body</label>
                </td>
                <td>
                    <input name="body" type="text" class="form-control" value="{{ $post->body }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Edit"/>
                </td>
            </tr>
        </table>
    </form>
@endsection
@section('bottom')
    <h3> <a href="/view"> To view </a></h3>
@endsection
