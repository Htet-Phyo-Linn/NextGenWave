@extends('user.master')
@section('styles')
@endsection
@section('content')
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
@endsection
