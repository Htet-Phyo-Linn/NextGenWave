@extends('admin.master')
@section('content')
    <!-- Button to trigger the modal -->

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
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Errors',
                            html: `{!! implode('<br>', $errors->all()) !!}`,
                            timer: 4000,
                            showConfirmButton: false
                        });
                    });
                </script>
            @endif

        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary rounded-pill" id="openModal" data-bs-toggle="modal"
                data-bs-target="#categoryModal">
                Add New Category
            </button>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Category List
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>

                                <th>Category ID</th>
                                {{-- <th>Category ID</th> --}}
                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $index => $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <!-- Edit Button -->
                                            <a href="{{ route('category.editPage', $category->id) }}" style="margin:0em 0.5em;"
                                                class="btn btn-dark btn-md">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <!-- Delete Button -->
                                            {{-- <a href="{{ route('category.delete', $category->id) }}"
                                                style="display: inline-block; margin-block-end: 0em; margin:0.8em 1em;"
                                                class="btn btn-secondary btn-md">
                                                <i class="fas fa-trash"></i> <!-- Font Awesome edit icon -->
                                            </a> --}}
                                            <form action="{{ route('category.delete', $category->id) }}" method="POST"
                                                style="margin:0em 0.5em;" class="btn-delete">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="btn btn-danger btn-md">
                                                    <i class="bi bi-trash"></i>
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
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Category Form</h5>
            </div>
            <form id="categoryForm" action="{{ route('category.create') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    {{--
                    <button type="submit" class="btn btn-primary rounded-pill d-none d-sm-block">Submit</button>
                    <button type="button" class="btn btn-light rounded-pill d-none d-sm-block"
                        data-bs-dismiss="modal">Close</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary rounded-pill ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>