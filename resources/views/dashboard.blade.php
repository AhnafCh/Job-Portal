@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">

        @foreach ($circulars as $circular)
        <div class="card mt-3">
            <div class="card-header">
                <div class="circular-title">
                    <h2>{{ $circular->title }}</h2>
                </div>
            </div>
            <div class="card-body">
                <h3>{{ $circular->company->name }}</h3>

            </div>
            <div class="card-footer">
                <a class="btn btn-primary" onclick="openModal('{{ $circular->id }}')">View Details</a>
                <form action="{{route('apply')}}" method="POST" style="display: inline;">
                    @csrf
                    <input type="hidden" name="circularid" value="{{ $circular->id }}">
                    <input type="hidden" name="companyid" value="{{ $circular->companyid }}">

                    @if (auth()->user()->user_type == 'seeker')
                    <button type="submit" class="btn btn-success">Apply</button>
                    @endif

                </form>
            </div>

            <div id="detailsModal{{ $circular->id }}" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Details for {{ $circular->title }}</h2>
                    </div>
                    <div class="modal-body">
                        <!-- Details content goes here -->
                        <p>{{ $circular->detail }}</p>
                    </div>

                    <div class="modal-footer justify-content-center">

                        <form action="{{route('apply')}}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="circularid" value="{{ $circular->id }}">
                            <input type="hidden" name="companyid" value="{{ $circular->companyid }}">

                            @if (auth()->user()->user_type == 'seeker')
                            <button type="submit" class="btn btn-success">Apply</button>
                            @endif

                        </form>

                        <button class="close-button btn btn-success"
                            onclick="closeModal('{{ $circular->id }}')">Close</button>


                    </div>



                </div>
            </div>
        </div>

        @endforeach

    </div>

</div>

@endsection