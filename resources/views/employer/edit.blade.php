@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">Edit {{ auth()->user()->name }}'s profile</div>
                <form method="post" action="{{route('contact.submit')}}">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" name="uSubject" class="form-control">
                        </div>

                        <div class="form-group">
                            <div class="mb-3">
                                <label for="validationTextarea">Your message</label>
                                <textarea class="form-control" id="validationTextarea" name="content" maxLength=3000
                                    required></textarea>

                            </div>
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection