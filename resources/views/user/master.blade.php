<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Youth Sphere</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('user/lib/animate/animate.min.css') }}" />
    <link href="{{ asset('user/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <style>
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            /* Ensure the navbar stays on top */
        }
    </style>


    @yield('styles')
</head>

<body style="background-color: rgba(255, 255, 255, 255);">

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0"
            style="background-image: linear-gradient(15deg,#316862 0%,  #1a618b 100%);">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary"><i class=""><img src="{{ asset('youth_sphere_logo.jpg') }}"
                            alt="logo"></i>Youth Sphere</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="/" class="nav-item nav-link {{ request()->routeIs('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('public.courses') }}"
                        class="nav-item nav-link {{ request()->routeIs('public.courses') ? 'active' : '' }}">Courses</a>

                    @auth
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <span class="dropdown-toggle">Account</span>
                            </a>
                            <div class="dropdown-menu m-0">
                                <a href=" {{ route('profile.edit') }}" class="dropdown-item"><i
                                        class="fas fa-user-alt me-2"></i> My
                                    Profile</a>
                                @auth
                                    <a href="#" class="dropdown-item" id="logout-link">
                                        <i class="fas fa-power-off me-2"></i> Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>

                                    <script>
                                        document.getElementById('logout-link').addEventListener('click', function(event) {
                                            event.preventDefault(); // Prevent the default action of the anchor tag
                                            document.getElementById('logout-form').submit(); // Submit the form
                                        });
                                    </script>
                                @endauth


                            </div>
                        </div>
                    @endauth
                    <a href="{{ route('contact') }}"
                        class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
                </div>

                @guest
                    <a href="{{ route('login') }}"
                        class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">
                        Get Started
                    </a>
                @endguest



            </div>
        </nav>


    </div>
    <!-- Navbar & Hero End -->
    @yield('content')


    <!-- Footer Start -->
    {{-- <div class="container-fluid footer wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5 border-start-0 border-end-0"
            style="border: 1px solid; border-color: rgb(255, 255, 255, 0.08);">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt text-primary me-3"></i>
                            <p class="mb-0">123 Street New York.USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-2">
                    <div class="footer-item">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope text-primary me-3"></i>
                            <p class=" mb-0">info@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-phone-alt text-primary me-3"></i>
                            <p class=" mb-0">(+012) 3456 7890</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item">

                        <div class="d-flex align-items-center mb-4">
                            <i class="fab fa-firefox-browser text-primary me-3"></i>
                            <p class=" mb-0">Yoursite@ex.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-body"><a href="{{ route('/') }}" class="border-bottom text-white"><i
                                class="fas fa-copyright text-light me-2"></i>Youth Sphere</a>, All right
                        reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-end text-body">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    {{-- Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a>
                    Distributed By <a class="border-bottom text-white" href="https://themewagon.com">ThemeWagon</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('user/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('user/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('user/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('user/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('user/js/main.js') }}"></script>

    @yield('scripts')


</body>

</html>
