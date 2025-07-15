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

    <div class="row mt-3">

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Lessons</h4>
                    <h2 class="mb-2">{{ $lessonCount ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Videos</h4>
                    <h2 class="mb-2">{{ $videoCount ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Categories</h4>
                    <h2 class="mb-2">{{ $categoryCount ?? 0 }}</h2>
                </div>
            </div>
        </div>

    </div>

    <script>
        const ctxEnrollment = document.getElementById('enrollmentChart').getContext('2d');
        const enrollmentChart = new Chart(ctxEnrollment, {
            type: 'doughnut',
            data: {
                labels: ['Enrollments'],
                datasets: [{
                    label: 'Enrollments',
                    data: [{{ $enrollmentCount ?? 0 }}],
                    backgroundColor: ['rgba(255, 255, 255, 0.7)'],
                    borderColor: ['rgba(255, 255, 255, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });

        const ctxUser = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctxUser, {
            type: 'doughnut',
            data: {
                labels: ['Users'],
                datasets: [{
                    label: 'Users',
                    data: [{{ $userCount ?? 0 }}],
                    backgroundColor: ['rgba(255, 255, 255, 0.7)'],
                    borderColor: ['rgba(255, 255, 255, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });

        const ctxCourse = document.getElementById('courseChart').getContext('2d');
        const courseChart = new Chart(ctxCourse, {
            type: 'doughnut',
            data: {
                labels: ['Courses'],
                datasets: [{
                    label: 'Courses',
                    data: [{{ $courseCount ?? 0 }}],
                    backgroundColor: ['rgba(255, 255, 255, 0.7)'],
                    borderColor: ['rgba(255, 255, 255, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });

        const ctxLesson = document.getElementById('lessonChart').getContext('2d');
        const lessonChart = new Chart(ctxLesson, {
            type: 'doughnut',
            data: {
                labels: ['Lessons'],
                datasets: [{
                    label: 'Lessons',
                    data: [{{ $lessonCount ?? 0 }}],
                    backgroundColor: ['rgba(255, 255, 255, 0.7)'],
                    borderColor: ['rgba(255, 255, 255, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });

        const ctxVideo = document.getElementById('videoChart').getContext('2d');
        const videoChart = new Chart(ctxVideo, {
            type: 'doughnut',
            data: {
                labels: ['Videos'],
                datasets: [{
                    label: 'Videos',
                    data: [{{ $videoCount ?? 0 }}],
                    backgroundColor: ['rgba(255, 255, 255, 0.7)'],
                    borderColor: ['rgba(255, 255, 255, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });

        const ctxCategory = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(ctxCategory, {
            type: 'doughnut',
            data: {
                labels: ['Categories'],
                datasets: [{
                    label: 'Categories',
                    data: [{{ $categoryCount ?? 0 }}],
                    backgroundColor: ['rgba(255, 255, 255, 0.7)'],
                    borderColor: ['rgba(255, 255, 255, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
@endsection