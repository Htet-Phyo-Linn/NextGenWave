@extends('user.layout')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Browse Courses</h2>

        {{-- Category Filter --}}
        <form method="GET" action="{{ route('courses.index') }}">
            <div class="row mb-4">
                <div class="col-md-4">
                    <select name="category_id" class="form-select" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Search Course</label>
                    <input type="text" name="search" class="form-control" placeholder="Search by title..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>

        {{-- Show selected category info --}}
        @if (request('category_id'))
            <div class="mb-3">
                <span class="badge bg-info text-dark">
                    Filtered by: {{ $categories->firstWhere('id', request('category_id'))->name ?? 'Unknown' }}
                </span>
                <a href="{{ route('courses.index') }}" class="btn btn-sm btn-outline-secondary ms-2">Clear Filter</a>
            </div>
        @endif

        {{-- Course Grid --}}
        <div class="row">
            @forelse ($courses as $course)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <img src="{{ $course->image ? asset($course->image) : asset('images/default-course.png') }}"
                            class="card-img-top" alt="Course Image">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text text-muted">{{ $course->category_name ?? 'Uncategorized' }}</p>
                            <p class="card-text">{{ Str::limit($course->description, 80) }}</p>
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary mt-auto">Enroll Now</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">No courses found in this category.</div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $courses->appends(request()->query())->links() }}
        </div>
    </div>
@endsection