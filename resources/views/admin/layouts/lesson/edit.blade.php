@extends('admin.master')

@section('content')
    <style>
        .form-control {
            height: 38px;
            /* Adjust the height of input fields */
            /* font-size: rem; */
            /* Adjust the font size */
            padding: 10px;
            /* Adjust padding for better spacing */
        }

        label {
            font-weight: bold;
            font-size: 1rem;
        }
    </style>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card" id="list_card">
                <div class="lesson_card">
                    <div class="card-body">
                        <h3 class="card-title">Edit Lesson: {{ $lesson->title }}</h3>

                        <div class="container">

                            <form action="{{ route('admin.lesson.edit') }}" method="POST">
                                @csrf
                                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">

                                <div class="form-group">
                                    <label for="lesson_title">Lesson Title</label>
                                    <input type="text" class="form-control" name="lesson_title" id="lesson_title"
                                        value="{{ $lesson->title }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" id="content"
                                        required>{{ $lesson->content }}</textarea>
                                </div>
                                <hr>
                                <h4>Edit : Videos</h4>

                                <div class="video-list" id="input-container">
                                    @foreach ($videos as $video)
                                        <div class="form-group mb-3 border p-3" id="input-box-{{ $loop->index + 1 }}">
                                            <input type="hidden" name="video_ids[]" value="{{ $video->id }}">
                                            <label class="mt-2 mb-1" for="video_title_{{ $video->id }}">Video
                                                Title</label>
                                            <input type="text" class="form-control" name="video_titles[]"
                                                id="video_title_{{ $video->id }}" value="{{ $video->title }}" required>

                                            <label class="mt-2 mb-1" for="video_url_{{ $video->id }}">Video URL</label>
                                            <input type="url" class="form-control" name="video_urls[]"
                                                id="video_url_{{ $video->id }}" value="{{ $video->video_url }}">

                                            <label class="mt-2 mb-1" for="video_duration_{{ $video->id }}">Duration</label>
                                            <input type="text" class="form-control" name="video_durations[]"
                                                id="video_duration_{{ $video->id }}" value="{{ $video->duration }}" required>
                                            <button type="button" class="btn btn-sm btn-danger mt-2 delete-button"
                                                data-id="{{ $loop->index + 1 }}">Delete</button>
                                            <hr>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" id="plus-button" class="btn btn-success">Add
                                    Video</button>
                                <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
                                <button type="submit" class="btn btn-primary" style="float: right;">Save Changes</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            let inputCount = {{ count($videos) }};

            $('#plus-button').on('click', function () {
                inputCount++;

                const newInputDiv = $(`
                            <div class="form-group mb-3 border p-3" id="input-box-${inputCount}">
                                <label class="mt-2 mb-1" for="video-title-${inputCount}">Video Title</label>
                                <input type="text" class="form-control" id="video-title-${inputCount}" name="video_titles[]" placeholder="Video Title (${inputCount})" required>
                                <label class="mt-2 mb-1" for="video-url-${inputCount}">Video URL</label>
                                <input type="url" class="form-control" id="video-url-${inputCount}" name="video_urls[]" placeholder="Video URL (${inputCount})" required>
                                <label class="mt-2 mb-1" for="duration-${inputCount}">Duration</label>
                                <input type="text" class="form-control" id="duration-${inputCount}" name="video_durations[]" placeholder="Duration (${inputCount})" required>
                                <button type="button" class="btn btn-sm btn-danger mt-2 delete-button" data-id="${inputCount}">Delete</button>
                            </div>
                        `);

                $('#input-container').append(newInputDiv);
            });

            $('#input-container').on('click', '.delete-button', function () {
                const id = $(this).data('id');
                $(`#input-box-${id}`).remove();

                inputCount = 0;
                $('#input-container .form-group').each(function () {
                    inputCount++;
                    $(this).attr('id', `input-box-${inputCount}`);
                    $(this).find('input').each(function (index) {
                        const placeholders = ['Video Title', 'Video URL', 'Duration'];
                        $(this).attr('placeholder', `${placeholders[index]} (${inputCount})`);
                        $(this).attr('id', `${$(this).attr('id').split('-')[0]}-${inputCount}`);
                        $(this).attr('name', `${$(this).attr('name').split('[')[0]}[]`);
                    });
                    $(this).find('.delete-button').data('id', inputCount);
                });
            });
        });
    </script>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#add-lesson-form').hide();

            $('#add-lesson-btn').on('click', function () {
                $('#list_card').hide();
                $('#add-lesson-btn').hide();
                $('#add-lesson-form').show();
            });

            $('#close-form-btn').on('click', function () {
                $('#add-lesson-form').hide();
                $('#add-lesson-btn').show();
                $('#list_card').show();
            });

            let inputCount = 0;

            $('#plus-button').on('click', function () {
                inputCount++;

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

                $('#input-container').append(newInputDiv);
            });

            $('#input-container').on('click', '.delete-button', function () {
                const id = $(this).data('id');
                $(`#input-box-${id}`).remove();

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

            $('#add-lesson-form-inner').on('submit', function (event) {
                event.preventDefault();

                const lessonData = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    course_id: $('#course_id').val(),
                    lesson_title: $('#lesson_title_add').val(),
                    content: $('#content_add').val(),
                    videos: []
                };

                $('#input-container .mb-3').each(function () {
                    const videoTitle = $(this).find('input[id^="video-title"]').val();
                    const videoURL = $(this).find('input[id^="video-url"]').val();
                    const duration = $(this).find('input[id^="duration"]').val();

                    if (videoTitle && videoURL && duration) {
                        lessonData.videos.push({
                            title: videoTitle,
                            url: videoURL,
                            duration: duration
                        });
                    }
                });

                $.ajax({
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

                        $('#add-lesson-form').hide();
                        $('#add-lesson-btn').show();
                        $('#list_card').show();
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