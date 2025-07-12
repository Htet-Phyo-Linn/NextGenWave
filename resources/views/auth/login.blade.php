{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ __('Login') }} - CodeLMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}" />
    <style>
        /* Dark mode adjustments */
        [data-theme="dark"] .text-muted {
            color: #ccc !important;
        }

        [data-theme="dark"] .card {
            background-color: #2c2f33;
            border-color: #444;
            color: #eee;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
        }

        [data-theme="dark"] .card input.form-control {
            background-color: #3b3f46;
            border-color: #555;
            color: #eee;
        }

        [data-theme="dark"] .card input::placeholder {
            color: #bbb;
        }

        [data-theme="dark"] .card label {
            color: #ddd;
        }

        [data-theme="dark"] .btn-primary {
            background-color: #4a90e2;
            border-color: #4a90e2;
        }

        [data-theme="dark"] .btn-primary:hover {
            background-color: #357abd;
            border-color: #357abd;
        }

        [data-theme="dark"] a.text-decoration-none {
            color: #7abaff;
        }

        [data-theme="dark"] a.text-decoration-none:hover {
            color: #a8cfff;
        }

        /* Also fix the theme switcher icon color in dark mode */
        [data-theme="dark"] .form-check-label {
            color: #eee !important;
        }
    </style>
</head>
<body>

    <div class="position-absolute top-0 end-0 p-3">
        <div class="form-check form-switch d-flex align-items-center">
            <input class="form-check-input" type="checkbox" id="theme-switcher" style="cursor:pointer" />
            <label class="form-check-label ms-2 text-dark" for="theme-switcher" title="Toggle dark mode">
                <i class="bi bi-moon"></i>
            </label>
        </div>
    </div>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg" style="width: 25rem;">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <h1 class="navbar-brand h1"><i class="bi bi-code-slash"></i> CodeLMS</h1>
                    <h3 class="mt-2">{{ __('Welcome Back!') }}</h3>
                    <p class="text-muted">{{ __('Sign in to continue your learning journey.') }}</p>
                </div>

                {{-- Session Status --}}
                @if (session('status'))
                    <div class="alert alert-success mb-3">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            required
                        />
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">{{ __('Log in') }}</button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <p class="text-muted small">
                        {{ __("Don't have an account?") }}
                        <a href="{{ route('register') }}" class="text-decoration-none">{{ __('Sign up') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
</body>
</html>
