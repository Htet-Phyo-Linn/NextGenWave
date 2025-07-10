@extends('user.layout')
@section('content')
<!-- Page Header -->
    <header class="page-header text-white text-center" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1742&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center;">
        <div class="container">
            <h1 class="display-4">Explore Our Courses</h1>
            <p class="lead">Find the perfect course to achieve your coding goals.</p>
        </div>
    </header>

    <!-- Courses Section -->
    <section class="py-5">
        <div class="container">
            <!-- Filter and Search -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for courses...">
                        <button class="btn btn-primary" type="button">Search</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-select">
                        <option selected>All Categories</option>
                        <option value="1">Web Development</option>
                        <option value="2">Data Science</option>
                        <option value="3">Mobile Development</option>
                        <option value="4">Game Development</option>
                    </select>
                </div>
            </div>

            <!-- Course Grid -->
            <div class="row">
                <!-- Course Card 1 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Full-Stack Web Development</h5>
                            <p class="card-text">Become a complete web developer by learning everything from front-end to back-end technologies.</p>
                            <a href="course-details.html" class="btn btn-primary mt-auto">Enroll Now</a>
                        </div>
                    </div>
                </div>
                <!-- Course Card 2 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Data Science with Python</h5>
                            <p class="card-text">Dive into data analysis, visualization, and machine learning with Python and its powerful libraries.</p>
                            <a href="course-details.html" class="btn btn-primary mt-auto">Enroll Now</a>
                        </div>
                    </div>
                </div>
                <!-- Course Card 3 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1607252650355-f7fd0460ccdb?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Mobile App Development</h5>
                            <p class="card-text">Build beautiful and functional native mobile apps for iOS and Android from scratch.</p>
                            <a href="course-details.html" class="btn btn-primary mt-auto">Enroll Now</a>
                        </div>
                    </div>
                </div>
                <!-- Course Card 4 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1511376777868-611b54f68947?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Introduction to DevOps</h5>
                            <p class="card-text">Learn the principles of DevOps to improve the speed and quality of software development.</p>
                            <a href="course-details.html" class="btn btn-primary mt-auto">Enroll Now</a>
                        </div>
                    </div>
                </div>
                <!-- Course Card 5 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">UI/UX Design Fundamentals</h5>
                            <p class="card-text">Master the fundamentals of user interface and user experience design to create intuitive products.</p>
                            <a href="course-details.html" class="btn btn-primary mt-auto">Enroll Now</a>
                        </div>
                    </div>
                </div>
                <!-- Course Card 6 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">2D Game Development with Unity</h5>
                            <p class="card-text">Create your own 2D games from scratch using the powerful Unity engine and C#.</p>
                            <a href="course-details.html" class="btn btn-primary mt-auto">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- @section('content')
    <div class="container" style="padding-top: 120px;">

        <div class="row">
            <!-- Search Bar -->
            {{-- <div class="col-md-12 mb-4">
                <input type="text" id="courseSearch" class="form-control" placeholder="Search for courses...">
            </div> --}}

            {{-- <div class="category-buttons" style="">
                <span>
                    <button class="btn btn-sm btn-outline-primary category-button active br-1"
                        data-category="all">All</button>
                </span>
                @foreach ($categories as $category)
                    <span>
                        <button class="btn btn-sm btn-outline-primary category-button br-1"
                            data-category="{{ $category->id }}">
                            {{ $category->name }}
                        </button>
                    </span>
                @endforeach
            </div> --}}
        {{-- </div> --}}


        {{-- <div class="row courseContainer">
            @foreach ($courses as $course)
                <div class="col-lg-3 col-md-4 col-12 mb-4 course-item" data-category="{{ $course->category_id }}">
                    <div class="card  h-100 br-1 wow fadeInUp" data-wow-delay="0.2s">

                        @if ($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top br-1"
                                alt="{{ $course->title }}">
                        @else
                            <img src="https://via.placeholder.com/350x200" class="card-img-top br-1" alt="Course Image">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text description">{{ Str::limit($course->description, 100) }}</p>
                            <p class="card-text price"><strong>Price:</strong> ${{ $course->price }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('lesson.list', $course->id) }}"
                                    style="display: inline-block; margin-block-end: 0em; margin:0.8em 0.2em;"
                                    class="btn btn-dark btn-md">
                                    <i class="fas fa-list"></i>
                                </a>
                                <button type="button" class="btn btn-outline-primary rounded-pill py-2 px-4"
                                    data-toggle="modal" data-target="#courseModal{{ $course->id }}">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}



        <!-- Courses Row -->
        {{-- <div class="row" id="courseContainer">
            @foreach ($courses as $course)
                <div class="col-lg-3 col-md-4 col-12 mb-4 course-item" data-category="{{ $course->category_id }}">
                    <div class="card h-100 br-1wow fadeInUp" data-wow-delay="0.2s">
                        @if ($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top br-1"
                                alt="{{ $course->title }}">
                        @else
                            <img src="https://via.placeholder.com/350x200" class="card-img-top br-1" alt="Course Image">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text description">{{ Str::limit($course->description, 100) }}</p>
                            <p class="card-text price"><strong>Price:</strong> ${{ $course->price }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('public.courses.detail', $course->id), $course->category_id }}"
                                    class="btn btn-outline-primary rounded-pill py-2 px-4" data-toggle="modal"
                                    data-target="#courseModal{{ $course->id }}">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <!-- Pagination Controls -->
        <div class="d-flex justify-content-center">
            {{ $courses->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection --}} 


{{-- @section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> <!-- jQuery first -->

    <script>
        $(document).ready(function() {
            $(document).on('click', '.category-button', function() {
                var categoryId = $(this).data('category'); // Get the category ID from the clicked button

                // If 'all' is clicked, send null to the server
                if (categoryId === "all") {
                    categoryId = null;
                }

                console.log('Category ID:', categoryId); // Log the category ID for debugging

                $.ajax({
                    url: '{{ route('public.courses.filter') }}', // Your route name here
                    type: 'GET',
                    data: {
                        category_id: categoryId // Pass the selected category ID (or null for all)
                    },
                    success: function(data) {
                        // Replace the course items with filtered results
                        $('#courseContainer').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX request failed: ' + status + ', ' + error);
                    }
                });
            });

            // Add active class to the clicked button and remove it from others
            $(document).on('click', '.category-button', function() {
                $('.category-button').removeClass('active');
                $(this).addClass('active');
            });



        });
    </script>
@endsection --}}
