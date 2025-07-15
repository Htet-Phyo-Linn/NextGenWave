@extends('user.layout')

@section('content')
    <!-- Page Header -->
    <header class="page-header text-white text-center position-relative"
        style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1742&auto=format&fit=crop'); background-size: cover; background-position: center; height: 60vh;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6);"></div>
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative z-1">
            <h1 class="display-4 fw-bold">Get in Touch</h1>
            <p class="lead">We'd love to hear from you. Please fill out the form below to contact us.</p>
        </div>
    </header>
    <div class="container py-5">
        <h2 class="mb-4 text-center fw-bold">Explore Our Courses</h2>

        {{-- Filter Section --}}
        <form method="GET" action="{{ route('courses.index') }}">
            <div class="row align-items-end g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Filter by Category</label>
                    <select name="category_id" class="form-select" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-5">
                    <label class="form-label fw-semibold">Search Course</label>
                    <input type="text" name="search" class="form-control" placeholder="Enter course title..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3 d-grid">
                    <button type="submit" class="btn btn-primary">Apply Filter</button>
                </div>
            </div>
        </form>

        {{-- Filter Summary --}}
        @if (request('category_id'))
            <div class="mb-3">
                <span class="badge bg-info text-dark px-3 py-2">Filtered by:
                    {{ $categories->firstWhere('id', request('category_id'))->name ?? 'Unknown' }}</span>
                <a href="{{ route('courses.index') }}" class="btn btn-sm btn-outline-secondary ms-2">Clear Filter</a>
            </div>
        @endif

        {{-- Course Cards --}}
        <div class="row g-4">
            @forelse ($courses as $course)
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm course-card">
                        <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('images/default-course.png') }}"
                            class="card-img-top rounded-top" alt="Course Image">

                        <div class="card-body d-flex flex-column">
                            <h6 class="text-primary small text-uppercase fw-semibold mb-1">
                                {{ $course->category_name ?? 'Uncategorized' }}
                            </h6>
                            <h5 class="card-title fw-bold">{{ $course->title }}</h5>
                            <p class="card-text small text-muted">{{ Str::limit($course->description, 80) }}</p>
                            <a href="{{ route('courses.show', $course->id) }}"
                                class="btn btn-outline-primary btn-sm mt-auto">View Course</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">No courses found for your search/filter.</div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $courses->withQueryString()->links('vendor.pagination.bootstrap-5') }}
        </div>

    </div>
@endsection