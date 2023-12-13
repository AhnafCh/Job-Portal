@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">Reset Password</div>
                <form action="" method="post">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">New passwords</label>
                            <input type="password" name="password" class="form-control" id='Password' required>

                        </div>

                        <br>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Confirm new password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection