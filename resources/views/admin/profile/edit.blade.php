@extends('admin.master')

@section('content')
    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    html: '<strong><i class="fa-solid fa-circle-check me-2"></i> {{ session('status') }}</strong>',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: '<strong>{!! session('error') !!}</strong>',
                });
            });
        </script>
    @endif
    <div class="page-heading">
        <h3>Admin Profile</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required autocomplete="username">
                            </div>

                            <div class="form-group">
                                <label for="profile_photo">Profile Photo</label>
                                <input type="file" id="profile_photo" name="profile_photo" class="form-control">
                            </div>

                            @if ($user->profile_photo_path)
                                <div class="form-group">
                                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile Photo"
                                        class="img-thumbnail" width="150">
                                </div>
                            @endif

                            <hr>
                            <h4 class="card-title">Update Password</h4>

                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" id="current_password" name="current_password" class="form-control"
                                     autocomplete="current-password">
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" id="password" name="password" class="form-control" 
                                    autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control"  autocomplete="new-password">
                                <div id="password-match-status" class="mt-2"></div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const password = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');
            const passwordMatchStatus = document.getElementById('password-match-status');

            function checkPasswordMatch() {
                const passwordValue = password.value;
                const confirmationValue = passwordConfirmation.value;

                if (confirmationValue === '') {
                    passwordMatchStatus.innerHTML = '';
                    return;
                }

                if (passwordValue === confirmationValue) {
                    passwordMatchStatus.innerHTML = '<span class="text-success">Passwords match.</span>';
                } else {
                    passwordMatchStatus.innerHTML = '<span class="text-danger">Passwords do not match.</span>';
                }
            }

            password.addEventListener('keyup', checkPasswordMatch);
            passwordConfirmation.addEventListener('keyup', checkPasswordMatch);
        });
    </script>
@endsection
