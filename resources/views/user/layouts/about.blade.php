@extends('user.layout')
@section('content')

<!-- Page Header with overlay -->
<header class="page-header text-white text-center position-relative"
    style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1742&auto=format&fit=crop'); background-size: cover; background-position: center; height: 60vh;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6);"></div>
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative z-1">
        <h1 class="display-4 fw-bold">About CodeLMS</h1>
        <p class="lead">Empowering future developers with practical, project-based learning.</p>
    </div>
</header>

<!-- About Section -->
<section class="py-5">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">Our Story</h2>
                <p>Founded in 2025, CodeLMS started with a single mission: to break down the barriers to learning software development. Today, we’ve helped thousands of students start their tech careers from the comfort of their homes.</p>
                <p>Our team is composed of developers and educators from around the world who believe that education should be accessible, practical, and inspiring.</p>
            </div>
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1529101091764-c3526daf38fe" class="img-fluid rounded shadow" alt="Our Story">
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Why Choose CodeLMS?</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <i class="bi bi-lightbulb-fill text-primary fs-1 mb-3"></i>
                <h5 class="fw-semibold">Project-Based Learning</h5>
                <p>All our courses are built around real-world projects that help you apply what you learn immediately.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="bi bi-laptop-fill text-success fs-1 mb-3"></i>
                <h5 class="fw-semibold">Flexible & Remote</h5>
                <p>Study anytime, anywhere with our responsive platform designed for mobile and desktop learning.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="bi bi-people-fill text-danger fs-1 mb-3"></i>
                <h5 class="fw-semibold">Supportive Community</h5>
                <p>Connect with peers and mentors in our inclusive community where no question is too small.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Meet the Team</h2>
        <div class="row g-4">
            @php
                $team = [
                    ['name' => 'Jane Doe', 'role' => 'Lead Instructor', 'img' => 1, 'desc' => 'Full-stack developer with 10+ years of experience. Passionate about teaching and building impactful products.'],
                    ['name' => 'John Smith', 'role' => 'Curriculum Developer', 'img' => 2, 'desc' => 'Breaks complex topics into digestible lessons. The mind behind our learning flow.'],
                    ['name' => 'Emily White', 'role' => 'Community Manager', 'img' => 3, 'desc' => 'Creates a safe space for students. Loves coffee and debugging support tickets.'],
                ];
            @endphp

            @foreach($team as $member)
                <div class="col-md-4">
                    <div class="card border-0 shadow team-card text-center h-100 p-3">
                        <img src="https://i.pravatar.cc/150?img={{ $member['img'] }}" class="rounded-circle mx-auto mt-3" width="100" height="100" alt="{{ $member['name'] }}">
                        <div class="card-body">
                            <h5 class="fw-bold">{{ $member['name'] }}</h5>
                            <p class="text-muted mb-1">{{ $member['role'] }}</p>
                            <p class="small">{{ $member['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
