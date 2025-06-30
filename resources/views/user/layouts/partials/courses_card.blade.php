@foreach ($courses as $course)
    <div class="col-lg-3 col-md-4 col-12 mb-4 course-item" data-category="{{ $course->category_id }}">
        <div class="card h-100 br-1wow fadeInUp" data-wow-delay="0.2s">
            @if ($course->image)
                <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top br-1" alt="{{ $course->title }}">
            @else
                <img src="https://via.placeholder.com/350x200" class="card-img-top br-1" alt="Course Image">
            @endif
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $course->title }}</h5>
                <p class="card-text description">{{ Str::limit($course->description, 100) }}</p>
                <p class="card-text price"><strong>Price:</strong> ${{ $course->price }}</p>
                <div class="mt-auto">
                    <a href="{{ route('public.courses.detail', $course->id) }}"
                        class="btn btn-outline-primary rounded-pill py-2 px-4" data-toggle="modal"
                        data-target="#courseModal{{ $course->id }}">
                        View Details
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
