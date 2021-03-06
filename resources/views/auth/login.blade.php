@extends('layouts.app')
@section('title', 'Create register')
@section('content')
    <div class="flex-center position-ref full-height ">
        <div class="container ">
            <div class="col-md-5 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('auth.authenticate') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input name="email" class="form-control" type="text" required="">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <input name="password" class="form-control" type="password" required="">
                                </div>
                                <div class="text-danger">
                                    {{Session::get('authenticate')}}
                                </div>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Authenticate
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('bottom')
    <h3><a href="/home"> To main </a></h3>
@endsection
