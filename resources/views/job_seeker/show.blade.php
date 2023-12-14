<!-- resources/views/job_seeker/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Hi, {{Auth::user()->name}}</h2>

        <!-- Display CV -->
        @if (Auth::user()->cv_path)
            <p><a href="{{ asset('storage/' . Auth::user()->cv_path) }}" target="_blank">Download CV</a></p>
        @else
            <p>No CV uploaded</p>
        @endif

        <!-- Update CV Form -->
        <h2>Update CV</h2>

        <form action="{{ route('job_seeker.updateCV') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="cv">Upload CV (PDF, DOC, DOCX)</label>
                <input type="file" class="form-control" id="cv" name="cv" required>
            </div>
            <button type="submit" class="btn btn-primary">Update CV</button>
        </form>
    </div>
@endsection
