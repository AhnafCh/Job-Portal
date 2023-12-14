@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Job Circular</h2>

        <form action="{{ route('employer.job_circular.update', $jobCircular) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $jobCircular->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $jobCircular->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="datetime-local" class="form-control" id="deadline" name="deadline" value="{{ $jobCircular->deadline }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Job Circular</button>
        </form>
    </div>
@endsection
