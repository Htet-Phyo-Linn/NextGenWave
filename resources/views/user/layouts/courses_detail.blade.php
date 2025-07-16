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
                    <p>Created by: <strong>{{ $course->instructor->name ?? 'Unknown' }}</strong></p>
                </div>

                <!-- Right Column: Price and CTA -->
                <div class="col-md-4 text-md-end mt-4 mt-md-0">
                    <h2>{{ $course->price }} mmk</h2>
                    @auth
                        @if ($isEnrolled)
                            <a href="{{ route('user.course.lessons', $course->id) }}" class="btn btn-primary btn-lg w-100">Start
                                Learning</a>
                        @else
                            <a href="mailto:admin@example.com" class="btn btn-outline-danger btn-lg w-100">Contact Admin</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg w-100"
                            onclick="return confirm('Please login to enroll in the course.')">Login to Enroll</a>
                    @endauth
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
                        @foreach ($lessons as $index => $lesson)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $index }}">
                                        <strong>{{ $lesson->title }}</strong>
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}"
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#curriculumAccordion">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            @php
                                                $lessonVideos = $videos->where('lesson_id', $lesson->id);
                                            @endphp

                                            @forelse ($lessonVideos as $video)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>
                                                        @if ($isEnrolled)
                                                            <a href="{{ route('user.course.lessons', ['id' => $course->id, 'video' => $video->id]) }}"
                                                                class="text-decoration-none">
                                                                <i class="bi bi-play-circle-fill me-2"></i>
                                                                {{ $video->title }}
                                                            </a>
                                                        @else
                                                            <i class="bi bi-lock-fill me-2"></i>
                                                            {{ $video->title }}
                                                        @endif
                                                    </div>
                                                </li>
                                            @empty
                                                <li class="list-group-item text-muted">No videos available for this module.
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Sidebar: Course Info -->
                <div class="col-lg-4" style="margin-top: 60px">
                    <div class="card sticky-sidebar">
                        @if ($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top"
                                alt="Course Thumbnail">
                        @else
                            <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Course Thumbnail">
                        @endif
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
