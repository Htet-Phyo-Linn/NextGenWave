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
        --sidebar-bg-dark: #1e1e1e;
        --accent: #0d6efd;
    }

    body[data-theme="dark"] {
        background-color: var(--bg-dark);
        color: var(--text-dark);
    }

    body[data-theme="dark"] .sidebar {
        background-color: var(--sidebar-bg-dark);
        border-color: var(--border-dark);
    }

    body[data-theme="dark"] .video-section,
    body[data-theme="dark"] .tab-content {
        background-color: var(--bg-dark);
        color: var(--text-dark);
    }

    body[data-theme="dark"] .nav-tabs .nav-link {
        color: #ccc;
    }

    body[data-theme="dark"] .nav-tabs .nav-link.active {
        background-color: var(--accent);
        color: #fff;
    }

    /* Sidebar styles */
    .sidebar {
        background-color: var(--sidebar-bg-light);
        border-right: 1px solid var(--border-light);
        height: 100vh;
        overflow-y: auto;
        padding: 1rem;
        position: sticky;
        top: 0;
    }

    .sidebar h5 {
        margin-bottom: 1rem;
    }

    .progress {
        height: 6px;
        margin-bottom: 1rem;
    }

    .module-list .list-group-item {
        cursor: pointer;
    }

    .module-list .list-group-item.active {
        background-color: var(--accent);
        color: white;
        font-weight: 600;
    }

    /* Video section */
    .video-section {
        padding: 1rem 1.5rem;
        background-color: var(--bg-light);
        position: relative;
    }

    .video-player {
        max-width: 100%;
        height: 360px;
        /* medium size */
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.1);
        margin-bottom: 1rem;
    }

    /* Tab content */
    .tab-content {
        border: 1px solid var(--border-light);
        border-top: none;
        border-radius: 0 0 0.375rem 0.375rem;
        background-color: var(--bg-light);
        color: var(--text-light);
        padding: 1rem;
    }

    /* Nav tabs */
    .nav-tabs .nav-link {
        color: var(--accent);
        font-weight: 500;
    }

    .nav-tabs .nav-link.active {
        background-color: var(--accent);
        color: #fff;
    }

    /* Responsive behavior */

    @media (max-width: 991.98px) {

        /* Tablet */
        .sidebar {
            height: auto;
            position: relative;
            border-right: 1px solid var(--border-light);
        }
    }

    @media (max-width: 767.98px) {

        /* Mobile */
        .sidebar {
            display: none !important;
        }

        /* Tabs container full width */
        .tabs-wrapper {
            margin-top: 0;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar (4 cols on md+ and hidden below md) -->
        <nav class="col-md-4 sidebar d-none d-md-block">
            <h5>Full-Stack Course</h5>

            <div>
                <small class="text-muted">15% Complete</small>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 15%;"></div>
                </div>
            </div>

            <div class="accordion accordion-flush module-list" id="lessonAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Module 1: Intro
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#lessonAccordion">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action active">1.1 - How the Web Works</a>
                            <a href="#" class="list-group-item list-group-item-action">1.2 - HTML5 Basics</a>
                            <a href="#" class="list-group-item list-group-item-action">1.3 - CSS3 Basics</a>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Module 2: Advanced
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#lessonAccordion">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action">2.1 - Flexbox & Grid</a>
                            <a href="#" class="list-group-item list-group-item-action">2.2 - JavaScript Basics</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Video & Content (8 cols on md+) -->
        <main class="col-md-8 video-section position-relative">
            <div class="video-player ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/videoseries?list=PL4-IK0AVhVjM0H_s0T63_vepP22V14G0y"
                    title="Course Videos" allowfullscreen frameborder="0"></iframe>
            </div>

            <!-- Tabs container -->
            <div class="tabs-wrapper">
                <ul class="nav nav-tabs" id="lessonTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                            data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                            aria-selected="true">
                            Overview
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="qa-tab" data-bs-toggle="tab" data-bs-target="#qa" type="button"
                            role="tab" aria-controls="qa" aria-selected="false">
                            Q&A
                        </button>
                    </li>
                    <li class="nav-item d-md-none" role="presentation"><!-- show only on mobile -->
                        <button class="nav-link" id="coursecontent-tab" data-bs-toggle="tab" data-bs-target="#coursecontent"
                            type="button" role="tab" aria-controls="coursecontent" aria-selected="false">
                            Course Content
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <h5 class="mt-3">About this lesson</h5>
                        <p>This lesson covers how the web works: clients, servers, DNS, and more.</p>
                    </div>
                    <div class="tab-pane fade" id="qa" role="tabpanel" aria-labelledby="qa-tab">
                        <h5 class="mt-3">Q&A</h5>
                        <p>No questions yet.</p>
                    </div>
                    <div class="tab-pane fade" id="resources" role="tabpanel" aria-labelledby="resources-tab">
                        <h5 class="mt-3">Resources</h5>
                        <ul>
                            <li><a href="#">MDN: How the Web Works</a></li>
                        </ul>
                    </div>

                    <!-- Course Content Tab (mobile only) -->
                    <div class="tab-pane fade d-md-none" id="coursecontent" role="tabpanel"
                        aria-labelledby="coursecontent-tab">
                        <h5 class="mt-3">Full-Stack Course</h5>

                        <div>
                            <small class="text-muted">15% Complete</small>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 15%;"></div>
                            </div>
                        </div>

                        <div class="accordion accordion-flush module-list" id="lessonAccordionMobile">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOneMobile">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOneMobile" aria-expanded="true"
                                        aria-controls="collapseOneMobile">
                                        Module 1: Intro
                                    </button>
                                </h2>
                                <div id="collapseOneMobile" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOneMobile" data-bs-parent="#lessonAccordionMobile">
                                    <div class="list-group list-group-flush">
                                        <a href="#" class="list-group-item list-group-item-action active">1.1 - How the Web Works</a>
                                        <a href="#" class="list-group-item list-group-item-action">1.2 - HTML5 Basics</a>
                                        <a href="#" class="list-group-item list-group-item-action">1.3 - CSS3 Basics</a>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwoMobile">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwoMobile" aria-expanded="false"
                                        aria-controls="collapseTwoMobile">
                                        Module 2: Advanced
                                    </button>
                                </h2>
                                <div id="collapseTwoMobile" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwoMobile" data-bs-parent="#lessonAccordionMobile">
                                    <div class="list-group list-group-flush">
                                        <a href="#" class="list-group-item list-group-item-action">2.1 - Flexbox & Grid</a>
                                        <a href="#" class="list-group-item list-group-item-action">2.2 - JavaScript Basics</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end course content tab -->
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
