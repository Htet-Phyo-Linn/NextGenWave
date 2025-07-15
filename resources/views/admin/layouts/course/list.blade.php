@extends('admin.master')
@section('content')
    <!-- Button to trigger the modal -->
    <style>
        #courseImg {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
        }
    </style>
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

            @if ($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Validation Errors',
                            html: `{!! implode('<br>', $errors->all()) !!}`,
                            timer: 4000,
                            showConfirmButton: false
                        });
                    });
                </script>
            @endif

            @if ($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const courseModal = new bootstrap.Modal(document.getElementById('courseModal'));
                        courseModal.show();
                    });
                </script>
            @endif






        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary" id="openModal" data-bs-toggle="modal"
                data-bs-target="#courseModal">
                Add New course
            </button>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Course List
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Instructor Name</th>
                                <th>Category Name</th>
                                <th>Course Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $index => $course)
                                <tr>

                                    <td>{{ $course->id }}
                                        <img id="courseImg" src="{{ asset('storage/' . $course->image) }}" alt="Course Image"
                                            style="float: right;">
                                    </td>
                                    <td>{{ $course->instructor_name }}</td>
                                    <td>{{ $course->category_name }}</td>
                                    <td>{{ $course->course_title }}</td>
                                    {{-- <td>{{ $course->description }}</td> --}}
                                    <td>
                                        <span class="tooltip-description" data-full-description="{{ $course->description }}">
                                            {{ Str::limit($course->description, 10, '...') }}
                                        </span>
                                    </td>
                                    <td>{{ $course->price }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.course.editPage', $course->id) }}"
                                                style="margin:0em 0.5em;" class="btn btn-dark btn-md">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin.lesson.list', $course->id) }}" style="margin:0em 0.5em;"
                                                class="btn btn-dark btn-md">
                                                <i class="bi bi-pencil">Lession List</i>
                                            </a>
                                            <form action="{{ route('admin.course.delete', $course->id) }}" method="POST"
                                                style="margin:0em 0.5em;" class="btn-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-md btn-delete">
                                                    <i class="bi bi-trash"></i> <!-- Font Awesome delete icon -->
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>



@endsection


<!-- Bootstrap Modal -->
<div class="col-lg-8 modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseModalLabel">Course Form</h5>
            </div>
            <div class="modal-body">
                <form id="courseForm" action="{{ route('admin.course.create') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="instructor_id" class="form-label">Instructor Id</label>
                        {{-- <input type="text" class="form-control" name="instructor_id" required> --}}

                        <input type="text" id="instructor_id" name="instructor_id" class="form-control"
                            value="{{ old('instructor_id') }}" required>

                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="course_title" class="form-label">Course Title</label>
                        <input type="course_title" class="form-control" id="course_title" name="course_title"
                            value="{{ old('course_title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                            value="{{ old('description') }}"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="price" class="form-control" id="price" name="price" value="{{ old('price') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="image" class="form-label">Image File Upload</label>
                            <input id="image" type="file" name="image" class="file-upload-default"
                                style="display: none;">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Select
                                        Image</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>