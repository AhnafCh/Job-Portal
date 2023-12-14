@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">Forgot Password</div>
                <form action="{{ route('postForgot') }}" method="post">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email')}}</span>
                            @endif
                        </div>

                        <br>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Send mail</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection