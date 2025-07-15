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


    <!-- Contact Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="mb-4">Send us a message</h2>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-4">Our Location</h2>
                    <div class="ratio ratio-16x9">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.789459544332!2d97.032222214926!3d20.78333338624333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f2a9fe19e5c0e6f%3A0x27e0e8f7e4e8f7e4!2sTaunggyi%2C%20Myanmar%20(Burma)!5e0!3m2!1sen!2sus!4v1625070422446!5m2!1sen!2sus"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
