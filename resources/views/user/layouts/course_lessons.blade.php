@extends('user.layout')

@section('content')
    <div class="container-fluid mb-4">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 d-none d-md-block pt-4 px-3 border-end sidebar"
                style="background-color: var(--sidebar-bg-light);">
                <h5 class="fw-bold mb-3" id="course-title">{{ $course->title }}</h5>


                <div class="accordion accordion-flush module-list" id="lessonAccordion">
                    @foreach ($lessons as $index => $lesson)
                        <div class="accordion-item" style="background-color: transparent; color: var(--text-color);">
                            <h2 class="accordion-header" id="heading{{ $lesson->id }}">
                                <button class="accordion-button @if ($index != 0) collapsed @endif"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $lesson->id }}"
                                    aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $lesson->id }}"
                                    style="background-color: var(--bg-light); color: var(--text-light);">
                                    {{ $lesson->title }}
                                </button>
                            </h2>
                            <div id="collapse{{ $lesson->id }}"
                                class="accordion-collapse collapse @if ($index == 0) show @endif"
                                aria-labelledby="heading{{ $lesson->id }}" data-bs-parent="#lessonAccordion">
                                <div class="list-group list-group-flush">
                                    @foreach ($videos[$lesson->id] ?? [] as $video)
                                        <a href="#" class="list-group-item list-group-item-action"
                                            style="background-color: transparent; color: var(--text-color);">
                                            <i class="bi bi-play-circle me-2"></i>{{ $video->title }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 pt-4 px-3 video-section"
                style="background-color: var(--bg-light); color: var(--text-light);">
                <!-- Video Player -->
                <div class="ratio ratio-16x9 mb-4 video-player"
                    style="height: 400px; border-radius: 15px; overflow: hidden;">
                    <iframe src="https://www.youtube.com/embed/videoseries?list=PL4-IK0AVhVjM0H_s0T63_vepP22V14G0y"
                        title="Course Videos" allowfullscreen frameborder="0" style="border-radius: 5px;"></iframe>
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
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">
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
                                                @foreach ($videos[$lesson->id] ?? [] as $video)
                                                    <a href="#" class="list-group-item list-group-item-action">
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
