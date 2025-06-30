@extends('user.master')

@section('content')
    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel" style="background-image: linear-gradient(15deg,#80d0c7 0%,  #13547a 100%);">
        <div class="header-carousel-item">
            <!-- <img src="" class="img-fluid w-100" alt="Image" style="background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);"> -->
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-12 animated fadeInUp">
                            <div class="text-center">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome To Youth Sphere</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4">Educate yourself, and the
                                    world becomes yours.</h1>
                                <p class="mb-5 fs-5">We offer you the most suitable course of action for your
                                    future, <br> therefore, we cordially invite you to join our team.</p>
                                <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2"
                                        href="{{ route('public.courses') }}"><i
                                            class="fas fa-play-circle me-2"></i>Courses</a>
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2"
                                        href="{{ route('register') }}">Join With Us</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <h2 class="text-white me-2">Follow Us:</h2>
                                    <div class="d-flex justify-content-end ms-2">
                                        <a class="btn btn-md-square btn-light rounded-circle me-2" href=""><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle ms-2" href=""><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
@endsection
