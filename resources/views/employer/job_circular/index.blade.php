@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mb-3 mt-3">
            <a href="{{ route('employer.job_circular.create') }}" class="btn btn-primary btn-lg">Post a Job Circular</a>
        </div>

        <h2 class="text-center mb-3">Your Job Circulars</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobCirculars as $jobCircular)
                    <tr>
                        <td>{{ $jobCircular->title }}</td>
                        <td>{{ $jobCircular->description }}</td>
                        <td>{{ $jobCircular->deadline }}</td>
                        <td>
                            <a href="{{ route('employer.job_circular.edit', $jobCircular) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('employer.job_circular.download', $jobCircular) }}" class="btn btn-sm btn-success">Download</a>

                            <!-- Add the "Delete" button -->
                            <form class="d-inline" action="{{ route('employer.job_circular.destroy', $jobCircular) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this job circular?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
