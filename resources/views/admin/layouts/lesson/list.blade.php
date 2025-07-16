@extends('admin.master')
@section('content')
    <style>
        .video-list {
            display: none;
            /* Hidden by default */
            margin-left: 20px;
            overflow: hidden;
            transition: max-height 0.3s ease-out;

        }

        .lesson-list {
            cursor: pointer;
        }

        .gap-2 {
            gap: 1rem;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="row  mb-3">
        <div class="col-md-9">
            @if (session('createSuccess'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            html: '<strong><i class="fa-solid fa-circle-check me-2"></i> {{ session('createSuccess') }}</strong>',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    });
                </script>
            @endif

            @if (session('updateSuccess'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Updated!',
                            html: '<strong><i class="fa-solid fa-circle-check me-2"></i> {{ session('updateSuccess') }}</strong>',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    });
                </script>
            @endif

            @if (session('deleteSuccess'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            html: '<strong><i class="fa-solid fa-circle-check me-2"></i> {{ session('deleteSuccess') }}</strong>',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    });
                </script>
            @endif

            <div class="flash-container mb-3"></div>


            @if (session('instructor_id_error'))
                <div class="row">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong>
                            <i class="fa-solid fa-circle-check me-2"></i>
                            {{ session('instructor_id_error') }}
                        </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

        </div>
        <div class="col-md-3">
            {{-- <button type="button" class="btn btn-primary" id="openModal" data-bs-toggle="modal"
                data-bs-target="#addLessonModal">
                Add New Lesson
            </button> --}}
            <button id="add-lesson-btn" class="btn btn-primary rounded-pill">Add Lesson</button>

        </div>
    </div>
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card" id="list_card">
                <div class="lesson_card">
                    <div class="card-body">
                        <p class="card-title mb-3" style="font-size: 1.5rem;">Lesson List</p>
                        <div id="lessons">
                            @if ($lessons->isEmpty())
                                <div class=" text-center mt-3">
                                    No lessons available.
                                </div>
                            @else
                                @foreach ($lessons as $lesson)
                                    <div class="lesson border p-3 m-3 shadow-sm rounded">
                                        <h4 class="lesson-list" data-lesson-id="{{ $lesson->id }}">
                                            {{ $lesson->title }} <!-- Display the lesson title -->
                                        </h4>
                                        <p>{{ $lesson->content }}</p>

                                        <div class="video-list" id="videos-{{ $lesson->id }}">

                                            @foreach ($lesson->videos as $video)
                                                <hr>
                                                <div class="video-item">
                                                    <p>{{ $video->title }}</p> <!-- Display video title -->

                                                    @if (empty($video->video_url) || !str_starts_with($video->video_url, 'https://'))
                                                        <!-- Button disabled when video URL is empty -->
                                                        <button class="btn btn-sm btn-secondary" disabled>
                                                            No Video Available
                                                        </button>
                                                    @else

                                                        <!-- Bootstrap 5-compatible collapse toggle -->
                                                        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#video-{{ $video->id }}" aria-expanded="false"
                                                            aria-controls="video-{{ $video->id }}">
                                                            Show Video
                                                        </button>

                                                        <div class="">
                                                            <!-- Collapse container -->
                                                            <div class="collapse mt-2" id="video-{{ $video->id }}">
                                                                <div class="card card-body">
                                                                    <div
                                                                        style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
                                                                        <iframe src="{{ $video->video_url }}"
                                                                            style="position:absolute; top:0; left:0; width:100%; height:100%;"
                                                                            frameborder="0" allowfullscreen>
                                                                        </iframe>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endif

                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="d-flex justify-content-end gap-2  mx-auto">
                                            <a href="{{ route('admin.lesson.editPage', $lesson->id) }}"
                                                class="btn btn-sm btn-secondary">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.lesson.delete', $lesson->id) }}" method="POST"
                                                class="delete-form btn-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-secondary btn-delete">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>

                    </div>
                </div>
                <div class="row m-3 mr-3">
                    <div style="text-align: right;">
                        <button type="button" class="btn btn-light" onclick="redirectToCourse();">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function redirectToCourse() {
            window.location.href = "{{ route('admin.course.list') }}"; // Change this to your actual route
        }
    </script>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card p-3" id="add-lesson-form">

                <form id="add-lesson-form" action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <p class="card-title mb-3" style="font-size: 1.5rem;">Add Lesson Form</p>

                    <div class="mb-3">
                        <label for="instructor_id" class="form-label">Instructor Id</label>
                        <input type="text" class="form-control" id="instructor_id" name="instructor_id" required>
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="course_id" name="course_id" value="{{ $id }}">

                        {{-- <input type="hidden" id="course_id" name="course_id" value="{{ $lesson->course_id }}"> --}}
                    </div>

                    <div class="mb-3">
                        <label for="lesson_title" class="form-label">Lesson Title</label>
                        <input type="text" class="form-control" id="lesson_title" name="lesson_title" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    </div>

                    <div class="container mb-3">
                        <!-- Container for dynamically added input boxes -->
                        <div id="input-container"></div>

                        <!-- Plus Button -->
                        <button type="button" id="plus-button" class="btn btn-sm btn-primary rounded-pill mt-3 mb-3"
                            style="float: left;">Add
                            Video</button>
                    </div>
                    <div class="d-flex justify-content-end gap-2  mx-auto">
                        <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                        <button type="button" class="btn btn-light" id="close-form-btn" style="float: right;">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // {{-- lesson click event script  --}}
        // Select all course titles
        const courseTitles = document.querySelectorAll('.lesson-list');

        // Add click event listener to each course title
        courseTitles.forEach(title => {
            title.addEventListener('click', function () {
                const lessonId = this.dataset.lessonId; // Get the course ID
                const lessonList = document.getElementById(`videos-${lessonId}`);
                const button = this;

                // Toggle visibility of the lesson list
                if (lessonList.style.display === 'none' || lessonList.style.display === '') {
                    // Hide all other lesson lists
                    document.querySelectorAll('.video-list').forEach(list => {
                        list.style.display = 'none';
                    });
                    // Reset all buttons text to "Show Video"
                    document.querySelectorAll('.lesson-list').forEach(btn => {
                        btn.textContent = btn.textContent.replace('Hide Video', 'Show Video');
                    });
                    // Show the selected lesson list
                    lessonList.style.display = 'block';
                    // Change button text to "Hide Video"
                    button.textContent = button.textContent.replace('Show Video', 'Hide Video');
                } else {
                    // Hide the lesson list if it's already visible
                    lessonList.style.display = 'none';
                    // Change button text to "Show Video"
                    button.textContent = button.textContent.replace('Hide Video', 'Show Video');
                }
            });
        });

        // Use Bootstrap collapse events to toggle button text and pause video on hide
        document.querySelectorAll('.collapse').forEach(collapseEl => {
            collapseEl.addEventListener('shown.bs.collapse', function () {
                const btn = document.querySelector(`button[data-bs-target="#${this.id}"]`);
                if (btn) {
                    btn.textContent = 'Hide Video';
                    btn.classList.remove('collapsed');
                    btn.setAttribute('aria-expanded', 'true');
                }
            });
            collapseEl.addEventListener('hidden.bs.collapse', function () {
                const btn = document.querySelector(`button[data-bs-target="#${this.id}"]`);
                if (btn) {
                    btn.textContent = 'Show Video';
                    btn.classList.add('collapsed');
                    btn.setAttribute('aria-expanded', 'false');
                }
                // Pause the video iframe when hidden
                const iframe = this.querySelector('iframe');
                if (iframe) {
                    const src = iframe.src;
                    iframe.src = '';
                    iframe.src = src;
                }
            });
        });




        let inputCount = 0; // Counter for unique div IDs

        // jQuery function to add new input boxes for video details
        $('#plus-button').on('click', function () {
            inputCount++; // Increment the count for unique ID

            // Create a new div for the video details
            const newInputDiv = $(`
                                                                                                                                                                                                                                                                                                                    <div class="mb-3 border p-3" id="input-box-${inputCount}">
                                                                                                                                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                                                                                                                                            <label for="video-title-${inputCount}">Video Title</label>
                                                                                                                                                                                                                                                                                                                            <input type="text" class="form-control" id="video-title-${inputCount}" placeholder="Video Title (${inputCount})">
                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                                                                                                                                            <label for="video-url-${inputCount}">Video URL</label>
                                                                                                                                                                                                                                                                                                                            <input type="text" class="form-control" id="video-url-${inputCount}" placeholder="Video URL (${inputCount})">
                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                                                                                                                                                                            <label for="duration-${inputCount}">Duration</label>
                                                                                                                                                                                                                                                                                                                            <input type="text" class="form-control" id="duration-${inputCount}" placeholder="Duration (${inputCount})">
                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                        <button class="btn btn-sm btn-danger delete-button mt-2" data-id="${inputCount}">Delete</button>
                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                `);

            // Append the new input div to the bottom of the container, right above the plus button
            $('#input-container').append(newInputDiv);
        });

        // Event delegation to handle delete button clicks
        $('#input-container').on('click', '.delete-button', function () {
            const id = $(this).data('id'); // Get the unique ID from the data attribute
            $(`#input-box-${id}`).remove(); // Remove the div from the DOM

            // Reorder input boxes after deletion
            inputCount = 0;
            $('#input-container .mb-3').each(function () {
                inputCount++;
                $(this).find('input').attr('placeholder', function (index) {
                    const placeholders = ['Video Title', 'Video URL', 'Duration'];
                    return `${placeholders[index]} (${inputCount})`;
                });
                $(this).attr('id', `input-box-${inputCount}`);
                $(this).find('.delete-button').data('id', inputCount);
            });
        });

        // form manage
        $(document).ready(function () {

            $('#add-lesson-form').hide();
            // Show the form when the "Add Lesson" button is clicked
            $('#add-lesson-btn').on('click', function () {
                $('#list_card').hide(); // Hide the lesson list
                $('#add-lesson-btn').hide(); // Hide the "Add Lesson" button
                $('#add-lesson-form').show(); // Show the add lesson form
            });

            // Close the form and show the lesson list again
            $('#close-form-btn').on('click', function () {
                $('#add-lesson-form').hide(); // Hide the form
                $('#add-lesson-btn').show(); // Show the "Add Lesson" button
                $('#list_card').show(); // Show the lesson list
            });


            // Capture values and send via AJAX on submit button click
            $('#add-lesson-form').on('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission

                const lessonData = {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token
                    course_id: $('#course_id').val(),
                    lesson_title: $('#lesson_title').val(),
                    content: $('#content').val(),
                    videos: []
                };

                // Loop through each input box and collect values
                $('#input-container .mb-3').each(function () {
                    const videoTitle = $(this).find('input[id^="video-title"]').val();
                    const videoURL = $(this).find('input[id^="video-url"]').val();
                    const duration = $(this).find('input[id^="duration"]').val();

                    // Push the data to the videos array if all fields are filled
                    if (videoTitle && videoURL && duration) {
                        lessonData.videos.push({
                            title: videoTitle,
                            url: videoURL,
                            duration: duration
                        });
                    }
                });
                console.log('Lesson Data:', lessonData);

                $.ajax({
                    // url: '/manager/lesson/listUpdate',
                    url: '{{ route('admin.lesson.listUpdate') }}',
                    method: 'POST',
                    data: lessonData,
                    success: function (response) {
                        $('.flash-container').html(`
                                                                                                                        <div class="row">
                                                                                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                                                                                <strong><i class="fa-solid fa-circle-check me-2"></i>Lesson added successfully!</strong>
                                                                                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    `);

                        setTimeout(() => {
                            $('.flash-container .alert').alert('close');
                            location.reload();

                        }, 300);

                        $('#add-lesson-form').hide(); // Hide the form
                        $('#add-lesson-btn').show(); // Show the "Add Lesson" button
                        $('#list_card').show(); // Show the lesson list
                    },
                    error: function (xhr) {
                        console.error(xhr);
                        alert('An error occurred. Please try again.');
                    }

                });
            });

        });
    </script>
@endsection