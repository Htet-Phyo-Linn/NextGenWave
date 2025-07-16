@extends('user.layout')

@section('content')
    <style>
        :root {
            --bg-light: #fff;
            --bg-dark: #121212;
            --text-light: #212529;
            --text-dark: #f8f9fa;
            --border-light: #dee2e6;
            --border-dark: #333;
            --sidebar-bg-light: #f9f9fb;
            --sidebar-bg-dark: #000000;
            /* pure black */
            --accent: #0d6efd;
            --link-hover-dark: #3399ff;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-light);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Dark mode */
        body[data-theme="dark"] {
            background-color: var(--bg-dark);
            color: var(--text-dark);
        }

        body[data-theme="dark"] .sidebar {
            background-color: var(--sidebar-bg-dark);
            border-color: var(--border-dark);
            transition: background-color 0.3s ease;
        }

        body[data-theme="dark"] .sidebar h5 {
            color: var(--text-dark);
        }

        body[data-theme="dark"] .module-list .list-group-item {
            background-color: transparent;
            color: var(--text-dark);
            border: none;
        }

        body[data-theme="dark"] .module-list .list-group-item:hover {
            background-color: #2a2a2a;
            color: var(--link-hover-dark);
        }

        body[data-theme="dark"] .module-list .list-group-item.active {
            background-color: var(--accent);
            color: #fff;
            font-weight: 600;
        }

        .video-section {
            padding: 1rem 1.5rem;
            background-color: var(--bg-light);
            color: var(--text-light);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body[data-theme="dark"] .video-section {
            background-color: var(--bg-dark);
            color: var(--text-dark);
        }

        .video-player {
            max-width: 100%;
            height: 360px;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }

        .tab-content {
            border: 1px solid var(--border-light);
            border-top: none;
            border-radius: 0 0 0.375rem 0.375rem;
            background-color: var(--bg-light);
            color: var(--text-light);
            padding: 1rem;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }

        body[data-theme="dark"] .tab-content {
            background-color: var(--bg-dark);
            color: var(--text-dark);
            border-color: var(--border-dark);
        }

        /* Nav tabs */
        .nav-tabs {
            border-bottom: 1px solid var(--border-light);
            transition: border-color 0.3s ease;
        }

        body[data-theme="dark"] .nav-tabs {
            border-bottom-color: var(--border-dark);
        }

        .nav-tabs .nav-link {
            color: var(--accent);
            font-weight: 500;
            border: 1px solid transparent;
            border-top-left-radius: 0.375rem;
            border-top-right-radius: 0.375rem;
            padding: 0.5rem 1rem;
            margin-bottom: -1px;
            transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            color: var(--accent);
            background-color: #e9f0ff;
            border-color: var(--border-light) var(--border-light) #e9f0ff;
        }

        body[data-theme="dark"] .nav-tabs .nav-link:hover {
            background-color: #2a2a2a;
            border-color: var(--border-dark) var(--border-dark) #2a2a2a;
        }

        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: var(--accent);
            border-color: var(--accent) var(--accent) transparent;
        }

        /* Responsive sidebar adjustments */
        @media (max-width: 991.98px) {
            .sidebar {
                height: auto;
                position: relative;
                border-right: 1px solid var(--border-light);
            }
        }

        @media (max-width: 767.98px) {
            .sidebar {
                display: none !important;
            }

            .tabs-wrapper {
                margin-top: 0;
            }
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (3 cols) -->
            <nav class="col-md-3 sidebar d-none d-md-block mt-2">
                <h5>{{ $course->title }}</h5>

                <div class="accordion accordion-flush module-list" id="lessonAccordion">
                    @foreach ($lessons as $index => $lesson)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $lesson->id }}">
                                <button class="accordion-button @if ($index != 0) collapsed @endif"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $lesson->id }}"
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
            </nav>

            <!-- Main content (9 cols) -->
            <main class="col-md-9 video-section position-relative">
                <div class="video-player" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                    @if ($active_video && $active_video->video_url)
                        <iframe src="{{ $active_video->video_url }}" title="{{ $active_video->title }}"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                            allowfullscreen sandbox="allow-scripts allow-same-origin"></iframe>
                    @else
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <p class="text-muted">Please select a video to start learning.</p>
                        </div>
                    @endif
                </div>

                <div class="tabs-wrapper">
                    <ul class="nav nav-tabs" id="lessonTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                                aria-selected="true">Overview</button>
                        </li>
                        <li class="nav-item d-md-none" role="presentation">
                            <button class="nav-link" id="coursecontent-tab" data-bs-toggle="tab"
                                data-bs-target="#coursecontent" type="button" role="tab" aria-controls="coursecontent"
                                aria-selected="false">Course Content</button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">
                            <h5 class="mt-3">About this lesson</h5>
                            <p>{{ $course->description }}</p>
                        </div>

                        <div class="tab-pane fade d-md-none" id="coursecontent" role="tabpanel"
                            aria-labelledby="coursecontent-tab">
                            <h5 class="mt-3">{{ $course->title }}</h5>

                            <div class="accordion accordion-flush module-list" id="lessonAccordionMobile">
                                @foreach ($lessons as $index => $lesson)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingMobile{{ $lesson->id }}">
                                            <button
                                                class="accordion-button @if ($index != 0) collapsed @endif"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseMobile{{ $lesson->id }}"
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
