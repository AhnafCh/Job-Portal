@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Job Circular</h2>

        <form action="{{ route('employer.job_circular.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="datetime-local" class="form-control" id="deadline" name="deadline" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Job Circular</button>
        </form>
    </div>
@endsection
