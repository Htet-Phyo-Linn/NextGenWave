@extends('admin.master')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Enrollments</h4>
                    <h2 class="mb-2">{{ $enrollmentCount ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Users</h4>
                    <h2 class="mb-2">{{ $userCount ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Courses</h4>
                    <h2 class="mb-2">{{ $courseCount ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Categories</h4>
                    <h2 class="mb-2">{{ $categoryCount ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Completed Course</h4>
                    <h2 class="mb-2">{{ $completedCount ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Account Creation</h4>
                    <canvas id="userCreationChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Enrollments</h4>
                    <canvas id="enrollmentChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // User Creation Chart
            const userCreationCtx = document.getElementById('userCreationChart').getContext('2d');
            const userCreationData = @json($userCreationData);
            new Chart(userCreationCtx, {
                type: 'line',
                data: {
                    labels: userCreationData.map(d => d.date),
                    datasets: [{
                        label: 'New Users',
                        data: userCreationData.map(d => d.count),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: true,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Enrollment Chart
            const enrollmentCtx = document.getElementById('enrollmentChart').getContext('2d');
            const enrollmentData = @json($enrollmentData);
            new Chart(enrollmentCtx, {
                type: 'line',
                data: {
                    labels: enrollmentData.map(d => d.date),
                    datasets: [{
                        label: 'Enrollments',
                        data: enrollmentData.map(d => d.count),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        fill: true,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
