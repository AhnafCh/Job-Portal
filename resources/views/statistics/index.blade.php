<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@extends('layouts.app')

@section('content')


    <div class="hero-section">
        <img src="{{ asset('image/pexels-william-fortunato-6140676.jpg') }}" alt="Welcome Image" class="img-fluid hero-image">
        <h2 class="text-white hero-title">Welcome to The Largest Online Job Portal of Bangladesh</h2>
    </div>


    <div class="container mt-5">
        <h2 class="text-center mb-4">
            <span class="badge bg-primary">Live</span>
            <span class="badge bg-secondary">Statistics</span>
        </h2>

        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <canvas id="jobSeekersChart"></canvas>
            </div>

            <div class="col-md-6 mb-4">
                <canvas id="employersChart"></canvas>
            </div>

            <div class="col-md-6 mb-4"> 
                <canvas id="jobCircularsChart"></canvas>
            </div>
        </div>
    </div>


    <script>
        var jobSeekersData = {
            labels: ['Total Job Seekers'],
            datasets: [{
                label: 'Count',
                data: [{{ $totalJobSeekers }}],
                backgroundColor: 'rgba(75, 192, 192, 0.5)', 
                borderColor: 'rgba(75, 192, 192, 1)', 
                borderWidth: 1
            }]
        };

        var employersData = {
            labels: ['Total Employers'],
            datasets: [{
                label: 'Count',
                data: [{{ $totalEmployers }}],
                backgroundColor: 'rgba(255, 99, 132, 0.5)', 
                borderColor: 'rgba(255, 99, 132, 1)', 
                borderWidth: 1
            }]
        };

        var jobCircularsData = {
            labels: ['Total Job Circulars'],
            datasets: [{
                label: 'Count',
                data: [{{ $totalCirculars }}],
                backgroundColor: 'rgba(153, 102, 255, 0.5)', 
                borderColor: 'rgba(153, 102, 255, 1)', 
                borderWidth: 1
            }]
        };

        var jobSeekersCtx = document.getElementById('jobSeekersChart').getContext('2d');
        var employersCtx = document.getElementById('employersChart').getContext('2d');
        var jobCircularsCtx = document.getElementById('jobCircularsChart').getContext('2d');

        var jobSeekersChart = new Chart(jobSeekersCtx, {
            type: 'bar',
            data: jobSeekersData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var employersChart = new Chart(employersCtx, {
            type: 'bar',
            data: employersData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var jobCircularsChart = new Chart(jobCircularsCtx, {
            type: 'bar',
            data: jobCircularsData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

<style>
    /* Navbar Styles (Assuming your navbar has the class 'navbar') */
    .navbar {
        position: relative;
        z-index: 1000; /* Ensure a higher z-index than the hero section */
    }

    /* Hero Section Styles */
    .hero-section {
        position: relative;
        overflow: hidden;
        height: 100vh;
        margin-top: -50px; /* Adjusted to remove extra space on top */
    }

    .hero-image {
        width: 100%;
        height: auto;
    }

    .hero-title {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
        font-size: 3rem;
        font-weight: bold;
        border: 2px solid white;
        padding: 10px;
        white-space: nowrap;
    }
</style>
