<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLMS - Your Coding Journey Starts Here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('user/css/style.css')}}">
    @yield('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.html"><i class="bi bi-code-slash"></i> CodeLMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courses.html">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-lg-2" href="login.html">Login</a>
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

   @yield('content')
    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About CodeLMS</h5>
                    <p>We are dedicated to providing the best online coding education to empower the next generation of developers.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.html" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="courses.html" class="text-white text-decoration-none">Courses</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Connect With Us</h5>
                    <a href="#" class="text-white me-2"><i class="bi bi-facebook h4"></i></a>
                    <a href="#" class="text-white me-2"><i class="bi bi-twitter h4"></i></a>
                    <a href="#" class="text-white me-2"><i class="bi bi-linkedin h4"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-github h4"></i></a>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>&copy; 2025 CodeLMS. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('user/js/main.js')}}"></script>
</body>
</html>