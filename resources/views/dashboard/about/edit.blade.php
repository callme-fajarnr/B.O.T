@extends('dashboard.layout.main')

@section('container')
    {{-- HEADER --}}
    <div class="dashboard-header mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>

                <span class="badge rounded-pill bg-warning-subtle text-warning mb-2 px-3 py-2">
                    EDIT
                </span>

                <h1 class="dashboard-title mb-1">
                    Edit About
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Update your company introduction and landing page information.
                </p>

            </div>

            <a href="/dashboard/about" class="btn btn-light rounded-4 px-4 shadow-sm">

                <i class="bi bi-arrow-left me-2"></i>

                Back

            </a>

        </div>

    </div>

    {{-- FORM --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="/dashboard/about/{{ $about->id }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <input type="hidden" name="oldImage" value="{{ $about->image_about }}">

                <div class="row g-4">

                    {{-- Line 1 --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Line 1
                        </label>

                        <input type="text" name="line_1" value="{{ old('line_1', $about->line_1) }}"
                            class="form-control form-control-lg @error('line_1') is-invalid @enderror"
                            placeholder="Enter first line">

                        @error('line_1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Line 2 --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Line 2
                        </label>

                        <input type="text" name="line_2" value="{{ old('line_2', $about->line_2) }}"
                            class="form-control form-control-lg @error('line_2') is-invalid @enderror"
                            placeholder="Enter second line">

                        @error('line_2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Line 3 --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Line 3
                        </label>

                        <input type="text" name="line_3" value="{{ old('line_3', $about->line_3) }}"
                            class="form-control form-control-lg @error('line_3') is-invalid @enderror"
                            placeholder="Enter third line">

                        @error('line_3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Solo --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Solo & Sight
                        </label>

                        <input type="text" name="solo_sight" value="{{ old('solo_sight', $about->solo_sight) }}"
                            class="form-control form-control-lg @error('solo_sight') is-invalid @enderror"
                            placeholder="Example : Explore Together">

                        @error('solo_sight')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- IMAGE --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            About Image
                        </label>

                        <div class="upload-card">

                            @if ($about->image_about)
                                <img src="{{ asset('storage/' . $about->image_about) }}"
                                    class="img-preview rounded-4 shadow-sm d-block">
                            @else
                                <img class="img-preview rounded-4 shadow-sm">
                            @endif

                            <input id="image_about" type="file" name="image_about"
                                class="form-control mt-3 @error('image_about') is-invalid @enderror"
                                onchange="previewImage_about()">

                            <small class="text-secondary mt-2 d-block">
                                Leave empty if you don't want to change the image.
                            </small>

                            @error('image_about')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

                <hr class="my-5">

                <div class="d-flex justify-content-end gap-3">

                    <a href="/dashboard/about" class="btn btn-light rounded-4 px-4">

                        Cancel

                    </a>

                    <button type="submit" class="btn btn-warning rounded-4 px-5">

                        <i class="bi bi-check-circle me-2"></i>

                        Update About

                    </button>

                </div>

            </form>

        </div>

    </div>

    <script>
        function previewImage_about() {

            const image = document.querySelector('#image_about');
            const preview = document.querySelector('.img-preview');

            if (image.files.length > 0) {

                preview.src = URL.createObjectURL(image.files[0]);

                preview.style.display = "block";

            }

        }
    </script>
@endsection
