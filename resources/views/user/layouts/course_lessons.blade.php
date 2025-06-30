@extends('user.master')

{{-- <div class="container" style="padding-top: 100px;">
        <h1>{{ $course->title }}</h1>
        <p>{{ $course->description }}</p>
        <p><strong>Price:</strong> ${{ $course->price }}</p>

        <h2>Lessons</h2>
        <ul>
            @foreach ($lessons as $lesson)
                <li>
                    <h4>{{ $lesson->title }}</h4>
                    <p>{{ $lesson->content }}</p>

                    <h5>Videos</h5>
                    <ul>
                        @foreach ($videos[$lesson->id] as $video)
                            <li>
                                <a href="{{ $video->video_url }}" target="_blank">{{ $video->title }}</a>
                                <span> (Duration: {{ $video->duration }} mins)</span>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div> --}}

@section('styles')
    <style>
        /* Initially hide video lists */
        .video-list {
            display: block;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        /* When expanded, set a reasonable max-height to allow smooth scrolling */
        .video-list.open {
            max-height: 500px;
            /* Adjust this value based on content */
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid" style="">
        <div class="row pt-5"></div>
        <div class=" rounded p-5">
            <div class="row text-center pt-2 ">
                <h3 class="">{{ $course->title }}</h3>
            </div>
            <div class="row mt-3 ">
                <div class="col-md-8 border border-primary rounded shadow">
                    <div class="card" style="transition: box-shadow 0.3s ease;">
                        <div style="position:relative; overflow:hidden;">
                            <!-- Set iframe source to the first video's URL by default -->
                            @php
                                // Get the first lesson and first video for the default view
                                $firstLesson = $lessons[0];
                                $firstVideo = $videos[$firstLesson['id']][0] ?? null;
                            @endphp
                            <iframe id="video-frame" src="{{ $firstVideo ? $firstVideo['video_url'] : '' }}" width="100%"
                                height="400" frameborder="0" allow="autoplay"></iframe>
                        </div>
                    </div>
                    <h4>
                        <div id="lesson-title" class="mt-3 font-weight-bold">
                            {{ $firstVideo['title'] ?? 'No video available' }}
                        </div>
                    </h4>
                </div>

                <div class="col-md-1"></div>

                <!-- Right Column: Lesson List -->
                <div class="col-md-3 border border-primary rounded shadow"
                    style="position: sticky; top: 80px; max-height: calc(90vh - 100px); overflow-y: auto;">
                    <h3 class="pt-2">Lessons</h3>
                    <div id="lessons">
                        @if (empty($lessons))
                            <div class="alert alert-info text-center mt-3">
                                No lessons available.
                            </div>
                        @else
                            @foreach ($lessons as $lesson)
                                <div class="lesson border rounded p-1 m-1 shadow-sm">
                                    <p class="lesson-list rounded" data-lesson-id="{{ $lesson->id }}"
                                        style="margin: 8px;">
                                        {{ $lesson->title }} <!-- Display the lesson title -->
                                    </p>

                                    <div class="video-list" id="videos-{{ $lesson->id }}">
                                        @foreach ($videos[$lesson->id] as $video)
                                            <hr style="margin: 8px; padding-left: 0px;">
                                            <div class="video-item">
                                                <a href="javascript:void(0)" class="video-link"
                                                    data-video-url="{{ $video->video_url }}"
                                                    data-title="{{ $video->title }}">
                                                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>{{ $video->title }}
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add click event listener to each lesson title
        document.querySelectorAll('.lesson-list').forEach(title => {
            title.addEventListener('click', function() {
                const lessonId = this.dataset.lessonId; // Get the lesson ID
                const lessonList = document.getElementById(`videos-${lessonId}`);

                // Toggle 'open' class to animate the collapse and expand
                if (lessonList.classList.contains('open')) {
                    lessonList.classList.remove('open');
                } else {
                    // Hide all other video lists
                    document.querySelectorAll('.video-list').forEach(list => {
                        list.classList.remove('open');
                    });

                    // Show the selected lesson's video list
                    lessonList.classList.add('open');
                }
            });
        });

        // Add click event listener for each video link to dynamically change iframe source
        document.querySelectorAll('.video-link').forEach(link => {
            link.addEventListener('click', function() {
                const videoUrl = this.dataset.videoUrl;
                const title = this.dataset.title;
                const iframe = document.getElementById('video-frame');

                // Update the iframe src with the new video URL
                iframe.src = videoUrl;
                document.getElementById('lesson-title').textContent = title;
            });
        });
    </script>
@endsection
