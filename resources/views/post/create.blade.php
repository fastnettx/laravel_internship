@extends('layout.layout')
@section('title', 'Create')

@section('content')
    <form action="create" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title"/></td>
            </tr>
            <tr>
                <td>Body</td>
                <td><input type="text" name="body"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Create">
                </td>
            </tr>
        </table>
    </form>
@endsection
@section('bottom')
    <h3> <a href="/"> To main </a></h3>
@endsection
