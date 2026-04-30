@extends('layout.main')

@section('container')

<div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">
    <div class="col-11 col-sm-8 col-md-5 col-lg-4">

        {{-- ALERT --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('loginError') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- CARD --}}
        <div class="card shadow-sm border-0 rounded-4 p-4">

            <h3 class="text-center mb-4 text-black-50">Login</h3>

            <form action="/login" method="POST">
                @csrf

                {{-- EMAIL --}}
                <div class="form-floating mb-3">
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="email" 
                        placeholder="name@example.com"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >
                    <label for="email">Email address</label>

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="form-floating mb-3">
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control" 
                        id="password" 
                        placeholder="Password"
                        required
                    >
                    <label for="password">Password</label>
                </div>

                {{-- BUTTON --}}
                <button class="btn btn-dark w-100 py-2 rounded-3">
                    Login
                </button>

                {{-- FOOTER --}}
                <p class="mt-4 mb-1 text-center text-muted small">
                    © 2026
                </p>

                <small class="d-block text-center">
                    Belum punya akun? 
                    <a href="/register" class="text-decoration-none text-primary">Register</a>
                </small>

            </form>
        </div>

    </div>
</div>

@endsection