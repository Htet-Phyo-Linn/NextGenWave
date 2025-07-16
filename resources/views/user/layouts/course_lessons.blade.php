@extends('user.layout')

@section('content')
    <div class="container-fluid mb-4">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block pt-4 px-3 border-end sidebar">
                <h5 class="fw-bold mb-3" id="course-title">{{ $course->title }}</h5>

                <div class="card p-3">
                    <div class="accordion accordion-flush module-list" id="lessonAccordion">
                        @foreach ($lessons as $index => $lesson)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $lesson->id }}">
                                    <button class="accordion-button @if ($index != 0) collapsed @endif" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $lesson->id }}"
                                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $lesson->id }}">
                                        {{ $lesson->title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $lesson->id }}"
                                    class="accordion-collapse collapse @if ($index == 0) show @endif"
                                    aria-labelledby="heading{{ $lesson->id }}" data-bs-parent="#lessonAccordion">
                                    <div class="list-group list-group-flush">
                                        @foreach ($lesson->videos ?? [] as $video)
                                            <a href="{{ route('user.course.lessons', ['id' => $course->id, 'video' => $video->id]) }}"
                                                class="list-group-item list-group-item-action @if ($active_video && $active_video->id == $video->id) active @endif">
                                                <i class="bi bi-play-circle me-2"></i>{{ $video->title }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </nav>

            <!-- Main content (8 cols) -->
            <main class="col-md-8 offset-md-1 video-section position-relative p-4">
                <div class="video-player mb-4" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                    @if ($active_video && $active_video->video_url)
                        <iframe src="{{ $active_video->video_url }}" title="{{ $active_video->title }}"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" allowfullscreen
                            sandbox="allow-scripts allow-same-origin"></iframe>
                    @else
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <p class="text-muted">Please select a video to start learning.</p>
                        </div>
                    @endif
                </div>

                <!-- Tabs -->
                <div class="tabs-wrapper">
                    <ul class="nav nav-tabs" id="lessonTabs" role="tablist"
                        style="border-bottom-color: var(--border-light);">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                                aria-selected="true">
                                Overview
                            </button>
                        </li>
                        <li class="nav-item d-md-none" role="presentation">
                            <button class="nav-link" id="coursecontent-tab" data-bs-toggle="tab"
                                data-bs-target="#coursecontent" type="button" role="tab" aria-controls="coursecontent"
                                aria-selected="false">
                                Course Content
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content border p-3"
                        style="background-color: var(--bg-light); color: var(--text-light); border-color: var(--border-light);">
                        <!-- Overview -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <h5 class="mt-3">About this lesson</h5>
                            <p>{{ $course->description }}</p>
                        </div>

                        <!-- Mobile View Course Content -->
                        <div class="tab-pane fade d-md-none" id="coursecontent" role="tabpanel"
                            aria-labelledby="coursecontent-tab">
                            <h5 class="mt-3">{{ $course->title }}</h5>

                            <div class="accordion accordion-flush module-list" id="lessonAccordionMobile">
                                @foreach ($lessons as $index => $lesson)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingMobile{{ $lesson->id }}">
                                            <button class="accordion-button @if ($index != 0) collapsed @endif" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseMobile{{ $lesson->id }}"
                                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                                aria-controls="collapseMobile{{ $lesson->id }}">
                                                {{ $lesson->title }}
                                            </button>
                                        </h2>
                                        <div id="collapseMobile{{ $lesson->id }}"
                                            class="accordion-collapse collapse @if ($index == 0) show @endif"
                                            aria-labelledby="headingMobile{{ $lesson->id }}"
                                            data-bs-parent="#lessonAccordionMobile">
                                            <div class="list-group list-group-flush">
                                                @foreach ($lesson->videos ?? [] as $video)
                                                    <a href="{{ route('user.course.lessons', ['id' => $course->id, 'video' => $video->id]) }}"
                                                        class="list-group-item list-group-item-action @if ($active_video && $active_video->id == $video->id) active @endif">
                                                        <i class="bi bi-play-circle me-2"></i>{{ $video->title }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection