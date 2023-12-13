@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">Applicants</div>
                <div>
                    {{-- // --}}
                    <ul>
                        @foreach($applicants as $applicant)
                        <li>
                            <a href="{{ route('view-profile', $applicant->seekerID) }}">{{ $applicant->seekerID
                                }}</a>
                        </li>
                        <!-- Display other applicant information -->
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection