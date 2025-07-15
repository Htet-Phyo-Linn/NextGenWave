@extends('admin.master')

@section('content')
    <div class="row mb-3">
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
                <div class="alert alert-danger alert-dismissible">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li><i class="fa-solid fa-circle-xmark me-2"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enrollmentModal">
                Enroll New Student
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-3">Enrollment List</p>

                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-border">
                            <thead>
                                <tr>
                                    <th>Enrollment ID</th>
                                    <th>User Name</th>
                                    <th>Course Name</th>
                                    <th>Status</th>
                                    <th>Enrolled At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            {{-- {{ dd($items->toArray()) }} --}}
                            <tbody>
                                @foreach ($items as $index => $enrollment)
                                    <tr>
                                        <td>{{ $enrollment->id ?? 'N/A' }}</td>
                                        <td>{{ $enrollment->user->name ?? 'N/A' }}</td>
                                        <td>{{ $enrollment->course->title ?? 'N/A' }}</td>
                                        <td>{{ ucfirst($enrollment->status) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($enrollment->enrolled_at)->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            {{-- <a href="{{ route('enrollment.editPage', $enrollment->id) }}"
                                                style="margin:0em 0.5em;" class="btn btn-dark btn-md">
                                                <i class="bi bi-pencil"></i>
                                            </a> --}}
                                            {{-- <button type="button" class="btn btn-dark btn-md" style="margin:0em 0.5em;"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editEnrollmentModal{{ $enrollment->id }}">
                                                <i class="bi bi-pencil"></i>
                                            </button> --}}
                                            <button type="button" class="btn btn-dark btn-sm editBtn"
                                                data-id="{{ $enrollment->id }}" data-user_id="{{ $enrollment->user_id }}"
                                                data-user_name="{{ $enrollment->user->name }}"
                                                data-course_id="{{ $enrollment->course_id }}"
                                                data-course_title="{{ $enrollment->course->title }}"
                                                data-status="{{ $enrollment->status }}" data-bs-toggle="modal"
                                                data-bs-target="#editEnrollmentModalEdit">
                                                <i class="bi bi-pencil"></i>
                                            </button>



                                            <form action="{{ route('admin.enrollment.delete', $enrollment->id) }}" method="POST"
                                                style="margin:0em 0.5em;" class="btn-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-md">
                                                    <i class="bi bi-trash"></i> <!-- Font Awesome delete icon -->
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Edit Enrollment Modal -->
<div class="modal fade" id="editEnrollmentModalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Enrollment</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">

                    <div class="mb-3">
                        <label for="edit_user_id" class="form-label">User</label>
                        <select name="user_id" id="edit_user_id" class="form-control" required>
                            <option value="">Loading...</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_course_id" class="form-label">Course</label>
                        <select name="course_id" id="edit_course_id" class="form-control" required>
                            <option value="">Loading...</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_status" class="form-label">Status</label>
                        <select name="status" id="edit_status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="enrollmentModal" tabindex="-1" aria-labelledby="enrollmentModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.enrollment.create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="enrollmentModalLabel">Enroll Student</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID</label>
                        <input type="number" name="user_id" id="user_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Course ID</label>
                        <input type="number" name="course_id" id="course_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enroll</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("editForm");

        document.querySelectorAll(".editBtn").forEach(button => {
            button.addEventListener("click", function () {
                const id = this.dataset.id;
                const userId = this.dataset.user_id;
                const userName = this.dataset.user_name;
                const courseId = this.dataset.course_id;
                const courseTitle = this.dataset.course_title;
                const status = this.dataset.status;

                // Set action URL
                form.action = `/admin/enrollment/${id}/update`;

                // Fill dropdowns with selected only (or replace with options if needed)
                document.getElementById("edit_user_id").innerHTML =
                    `<option value="${userId}" selected>${userName}</option>`;
                document.getElementById("edit_course_id").innerHTML =
                    `<option value="${courseId}" selected>${courseTitle}</option>`;

                // Set selected status
                document.getElementById("edit_status").value = status;
            });
        });
    });
</script>