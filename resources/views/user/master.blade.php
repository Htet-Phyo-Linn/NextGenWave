<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLMS - Your Coding Journey Starts Here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    @yield('styles')
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
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white text-decoration-none p-0"
                                style="border: none; background: none;">
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

    <!-- Hero Section -->
    <header class="hero-section text-white text-center">
        <div class="container">
            <h1 class="display-4">Learn to Code, Build Your Future</h1>
            <p class="lead">Master in-demand programming skills with our project-based courses.</p>
            <a href="courses.html" class="btn btn-primary btn-lg">Browse Courses</a>
        </div>
    </header>

    <!-- Featured Courses Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Featured Courses</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Full-Stack Web Development</h5>
                            <p class="card-text">Learn to build complete web applications from front-end to back-end.
                            </p>
                            <a href="course-details.html" class="btn btn-primary mt-auto">Enroll Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Data Science with Python</h5>
                            <p class="card-text">Explore data analysis, visualization, and machine learning with Python.
                            </p>
                            <a href="course-details.html" class="btn btn-primary mt-auto">Enroll Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1607252650355-f7fd0460ccdb?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Mobile App Development</h5>
                            <p class="card-text">Build beautiful and functional native mobile apps for iOS and Android.
                            </p>
                            <a href="course-details.html" class="btn btn-primary mt-auto">Enroll Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1511376777868-611b54f68947?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Introduction to DevOps</h5>
                            <p class="card-text">Improve software development speed and quality with DevOps principles.
                            </p>
                            <a href="course-details.html" class="btn btn-primary mt-auto">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="courses.html" class="btn btn-secondary">More Courses</a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Why CodeLMS?</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="bi bi-person-video3 display-4 text-primary mb-3"></i>
                        <h4>Expert Instructors</h4>
                        <p>Learn from industry professionals with years of real-world experience.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="bi bi-laptop display-4 text-primary mb-3"></i>
                        <h4>Hands-On Projects</h4>
                        <p>Apply what you learn with practical projects that build a strong portfolio.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="bi bi-people-fill display-4 text-primary mb-3"></i>
                        <h4>Community Support</h4>
                        <p>Get help and collaborate with fellow students and mentors in our active community.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">What Our Students Say</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card h-100">
                        <i class="bi bi-quote display-4 text-primary"></i>
                        <p class="testimonial-text">"The full-stack course was a game-changer for my career. The
                            project-based approach made learning effective and fun!"</p>
                        <div class="testimonial-author">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Student" class="rounded-circle">
                            <div>
                                <h5 class="mb-0">Alex Johnson</h5>
                                <small class="text-muted">Web Developer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card h-100">
                        <i class="bi bi-quote display-4 text-primary"></i>
                        <p class="testimonial-text">"I went from zero coding knowledge to building my own mobile app.
                            The instructors are incredibly supportive."</p>
                        <div class="testimonial-author">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Student" class="rounded-circle">
                            <div>
                                <h5 class="mb-0">Maria Garcia</h5>
                                <small class="text-muted">Appreneur</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card h-100">
                        <i class="bi bi-quote display-4 text-primary"></i>
                        <p class="testimonial-text">"The data science course helped me land my dream job. The
                            curriculum is top-notch and the instructors are amazing."</p>
                        <div class="testimonial-author">
                            <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Student" class="rounded-circle">
                            <div>
                                <h5 class="mb-0">David Lee</h5>
                                <small class="text-muted">Data Scientist</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About CodeLMS</h5>
                    <p>We are dedicated to providing the best online coding education to empower the next generation of
                        developers.</p>
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
    <script src="{{ asset('user/js/main.js') }}"></script>
</body>

</html>
