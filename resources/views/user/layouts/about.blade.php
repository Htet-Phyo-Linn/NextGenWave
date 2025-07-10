@extends('user.layout')
@section('content')
<!-- Page Header -->
    <header class="page-header text-white text-center" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1742&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center;">
        <div class="container">
            <h1 class="display-4">About CodeLMS</h1>
            <p class="lead">Our mission is to make coding education accessible to everyone.</p>
        </div>
    </header>

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Our Story</h2>
                    <p>CodeLMS was founded in 2025 with a simple goal: to provide high-quality, project-based coding courses that empower individuals to build their future. We believe that anyone can learn to code, and we're here to provide the tools and support to make that happen.</p>
                </div>
                <div class="col-md-6">
                    <h2>Our Mission</h2>
                    <p>We are a team of passionate developers, designers, and educators who are dedicated to creating the best possible learning experience for our students. We have years of experience in the industry, and we're excited to share our knowledge with you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Meet the Team</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center team-card">
                        <img src="https://i.pravatar.cc/150?img=1" class="card-img-top rounded-circle mx-auto mt-3" alt="Team Member">
                        <div class="card-body">
                            <h5 class="card-title">Jane Doe</h5>
                            <p class="card-text text-muted">Lead Instructor</p>
                            <p class="card-text">Jane is a full-stack developer with over 10 years of experience in the tech industry. She's passionate about teaching and empowering the next generation of developers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center team-card">
                        <img src="https://i.pravatar.cc/150?img=2" class="card-img-top rounded-circle mx-auto mt-3" alt="Team Member">
                        <div class="card-body">
                            <h5 class="card-title">John Smith</h5>
                            <p class="card-text text-muted">Curriculum Developer</p>
                            <p class="card-text">John is a software engineer and curriculum developer with a knack for breaking down complex topics into easy-to-understand lessons. He's the mastermind behind our course content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center team-card">
                        <img src="https://i.pravatar.cc/150?img=3" class="card-img-top rounded-circle mx-auto mt-3" alt="Team Member">
                        <div class="card-body">
                            <h5 class="card-title">Emily White</h5>
                            <p class="card-text text-muted">Community Manager</p>
                            <p class="card-text">Emily is a community manager and student advocate. She's dedicated to creating a supportive and inclusive learning environment for all of our students.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection