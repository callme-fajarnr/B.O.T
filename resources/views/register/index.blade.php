@extends('layout.main')

@section('container')

<div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">
    <div class="col-11 col-sm-8 col-md-5 col-lg-4">

        {{-- CARD --}}
        <div class="card shadow-sm border-0 rounded-4 p-4">

            <h3 class="text-center mb-4 text-black-50">Register</h3>

            <form action="/register" method="POST">
                @csrf

                {{-- NAME --}}
                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        id="name" 
                        placeholder="Name"
                        value="{{ old('name') }}"
                        required
                    >
                    <label for="name">Name</label>

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- USERNAME --}}
                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        name="username" 
                        class="form-control @error('username') is-invalid @enderror" 
                        id="username" 
                        placeholder="Username"
                        value="{{ old('username') }}"
                        required
                    >
                    <label for="username">Username</label>

                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

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
                    >
                    <label for="email">Email address</label>

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="form-floating mb-3">
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        id="password" 
                        placeholder="Password"
                        required
                    >
                    <label for="password">Password</label>

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <button class="btn btn-dark w-100 py-2 rounded-3">
                    Register
                </button>

                {{-- FOOTER --}}
                <p class="mt-4 mb-1 text-center text-muted small">
                    © 2026
                </p>

                <small class="d-block text-center">
                    Sudah punya akun? 
                    <a href="/login" class="text-decoration-none text-primary">Login</a>
                </small>

            </form>
        </div>

    </div>
</div>

@endsection