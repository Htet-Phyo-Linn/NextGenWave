{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Register') }} - CodeLMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <style>
        [data-theme="dark"] body {
            background-color: #121212 !important;
            color: #f1f1f1;
        }

        [data-theme="dark"] .card {
            background-color: #1f1f1f;
            color: #f1f1f1;
        }

        [data-theme="dark"] .form-control {
            background-color: #2c2c2c;
            color: #f1f1f1;
            border-color: #444;
        }

        [data-theme="dark"] .form-control::placeholder {
            color: #aaa;
        }

        [data-theme="dark"] .btn-primary {
            background-color: #0d6efd;
        }

        [data-theme="dark"] .form-check-label i {
            color: #f1f1f1;
        }

        [data-theme="dark"] .text-muted {
            color: #ccc !important;
            
        }
    </style>
</head>

<body class="bg-light">

    <div class="container vh-100 d-flex justify-content-center align-items-center">

        {{-- Theme switcher --}}
        <div class="position-absolute top-0 end-0 m-3">
            <li class="nav-item form-check form-switch d-flex align-items-center list-unstyled">
                <input class="form-check-input" type="checkbox" id="theme-switcher" style="cursor:pointer">
                <label class="form-check-label ms-2" for="theme-switcher" title="Toggle dark mode">
                    <i class="bi bi-moon"></i>
                </label>
            </li>
        </div>

        <div class="card shadow-lg" style="width: 24rem;">
            <div class="card-body p-4"> {{-- Reduced padding here --}}
                <div class="text-center mb-3">
                    <h1 class="navbar-brand h1"><i class="bi bi-code-slash"></i> CodeLMS</h1>
                    <h4 class="mt-2">{{ __('Create Account') }}</h4>
                    <p class="text-muted small">{{ __('Join and start learning today.') }}</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-2">
                        <label for="name" class="form-label">{{ __('Full Name') }}</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                            required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">{{ __('Sign Up') }}</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p class="text-muted small">{{ __('Already have an account?') }}
                        <a href="{{ route('login') }}" class="text-decoration-none">{{ __('Login') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
</body>

</html>
