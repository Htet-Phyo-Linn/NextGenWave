<!-- resources/views/profile/show.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Profile - CodeLMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.html"><i class="bi bi-code-slash"></i> CodeLMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link nav-link text-decoration-none p-0"
                                style="margin-top:8px;  border: none; background: none;">
                                Logout
                            </button>
                        </form>
                    </li>

                    <li class="nav-item form-check form-switch ms-lg-3 d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" id="theme-switcher" style="cursor:pointer">
                        <label class="form-check-label ms-2 text-white" for="theme-switcher" title="Toggle dark mode">
                            <i class="bi bi-moon"></i>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Profile Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0 course-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://i.pravatar.cc/120?img=5' }}"
                                     alt="User Avatar"
                                     class="rounded-circle me-4 border border-3"
                                     width="100" height="100" />
                                <div>
                                    <h3 class="mb-0" style="color: var(--text-color);">{{ $user->name }}</h3>
                                    <p class="mb-1" style="color: var(--text-color);">{{ $user->email }}</p>
                                    <span class="badge bg-primary">{{ $user->role ?? 'Student' }}</span>
                                </div>
                            </div>

                            <hr class="my-4" />

                            <h5 class="mb-3" style="color: var(--text-color);">Profile Details</h5>
                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="profileName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="profileName" name="name"
                                               value="{{ old('name', $user->name) }}" required />
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="profileEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="profileEmail" name="email"
                                               value="{{ old('email', $user->email) }}" required />
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="profilePhoto" class="form-label">Profile Photo</label>
                                        <input type="file" class="form-control" id="profilePhoto" name="profile_photo"
                                               accept="image/*" />
                                        @error('profile_photo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="profileRole" class="form-label">Role</label>
                                        <input type="text" class="form-control" id="profileRole"
                                               value="{{ $user->role ?? 'Student' }}" disabled />
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>

                            <hr class="my-4" />

                            <h5 class="mb-3" style="color: var(--text-color);">Enrolled Courses</h5>
                            <ul class="list-group">
                                @foreach ($enrolledCourses as $course)
                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                        style="background-color: var(--card-bg-color); color: var(--text-color); border: 1px solid var(--card-border-color);">
                                        {{ $course['title'] }}
                                        <span class="badge {{ $course['status'] === 'In Progress' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $course['status'] }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 CodeLMS. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
</body>

</html>
