@extends('user.layout')
@section('content')
    <!-- Course Header -->

    <header class="page-header text-white position-relative"
        style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1742&auto=format&fit=crop'); background-size: cover; background-position: center; height: 60vh;">

        <!-- Dark Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6); z-index: 0;">
        </div>

        <!-- Content: Two Columns -->
        <div class="container h-100 position-relative z-1 d-flex align-items-center">
            <div class="row w-100">
                <!-- Left Column: Course Info -->
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold">{{ $course->title }}</h1>
                    <p class="lead">{{ $course->description }}</p>
                    <p>Created by: <strong>{{ $course->instructor_id }}</strong></p>
                </div>

                <!-- Right Column: Price and CTA -->
                <div class="col-md-4 text-md-end mt-4 mt-md-0">
                    <h2>{{ $course->price }} mmk</h2>
                    <a href="video-lesson.html" class="btn btn-primary btn-lg w-100">Enroll Now</a>
                </div>
            </div>
        </div>
    </header>



    <!-- Course Content Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Main Content: Curriculum -->
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h2 class="mb-4">Course Curriculum</h2>
                    <div class="accordion" id="curriculumAccordion">
                        <!-- Module 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <strong>Module 1: Introduction to Web Development</strong>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#curriculumAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="bi bi-play-circle-fill me-2"></i> 1.1 - How
                                            the Web Works</li>
                                        <li class="list-group-item"><i class="bi bi-play-circle-fill me-2"></i> 1.2 -
                                            Introduction to HTML5</li>
                                        <li class="list-group-item"><i class="bi bi-play-circle-fill me-2"></i> 1.3 -
                                            Introduction to CSS3</li>
                                        <li class="list-group-item"><i class="bi bi-file-earmark-code-fill me-2"></i>
                                            Project: Build a Personal Portfolio Page</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Module 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <strong>Module 2: Advanced CSS and JavaScript</strong>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#curriculumAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="bi bi-play-circle-fill me-2"></i> 2.1 -
                                            Flexbox and Grid</li>
                                        <li class="list-group-item"><i class="bi bi-play-circle-fill me-2"></i> 2.2 -
                                            JavaScript Fundamentals</li>
                                        <li class="list-group-item"><i class="bi bi-play-circle-fill me-2"></i> 2.3 - DOM
                                            Manipulation</li>
                                        <li class="list-group-item"><i class="bi bi-file-earmark-code-fill me-2"></i>
                                            Project: Interactive To-Do List</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Module 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <strong>Module 3: Back-End Development with Node.js</strong>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#curriculumAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="bi bi-play-circle-fill me-2"></i> 3.1 -
                                            Introduction to Node.js and NPM</li>
                                        <li class="list-group-item"><i class="bi bi-play-circle-fill me-2"></i> 3.2 -
                                            Building APIs with Express</li>
                                        <li class="list-group-item"><i class="bi bi-play-circle-fill me-2"></i> 3.3 -
                                            Working with Databases (MongoDB)</li>
                                        <li class="list-group-item"><i class="bi bi-file-earmark-code-fill me-2"></i>
                                            Project: A Simple Blog API</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar: Course Info -->
                <div class="col-lg-4" style="margin-top: 60px">
                    <div class="card sticky-sidebar">
                        <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=1931&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body" style="padding: 10px">
                            <h5 class="card-title">Course Features</h5>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-camera-video me-2"></i> 25+ hours of video</li>
                                <li><i class="bi bi-file-earmark-arrow-down me-2"></i> Downloadable resources</li>
                                <li><i class="bi bi-phone me-2"></i> Access on mobile and desktop</li>
                                <li><i class="bi bi-patch-check-fill me-2"></i> Certificate of completion</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- @section('content')
    <!-- Abvout Start -->
    <div class="container-fluid about mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="bg-primary rounded position-relative overflow-hidden">
                        @if ($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" class="img-fluid rounded w-100"
                                alt="{{ $course->title }}">
                        @else
                            <img src="https://via.placeholder.com/350x200" class="card-img-top br-1" alt="Course Image">
                        @endif
                    </div>

                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div>
                        <h4 class="text-primary">{{ $category->title }}</h4>
                        <h1 class="display-5 mb-4">{{ $course->title }}</h1>
                        <p class="mb-4">
                            {{ $course->description }}
                        </p>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h5>Number of Student</h5>
                                        <p>{{ $enrollmentCount }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="fas fa-envelope fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h5>Email</h5>
                                        <p>youthsphere@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ route('course.lessons', $course->id) }}"
                                    class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">Learn Now</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex">
                                    <i class="fas fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h5>Call Us</h5>
                                        <p class="mb-0 fs-5" style="letter-spacing: 1px;">+01234567890</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection --}}
