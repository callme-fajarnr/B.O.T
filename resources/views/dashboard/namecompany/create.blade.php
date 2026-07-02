@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Create <span>Company</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Add your company information and upload the company logo.
                </p>
            </div>

            <a href="{{ route('namecompany.index') }}" class="btn btn-light rounded-4 px-4 shadow-sm">

                <i class="bi bi-arrow-left me-2"></i>
                Back

            </a>

        </div>
    </div>

    <div class="card">

        <div class="card-body p-4">

            <form action="/dashboard/namecompany" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- NAME COMPANY --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Company Name
                        </label>

                        <input type="text" id="namecompany" name="namecompany" value="{{ old('namecompany') }}"
                            class="form-control @error('namecompany') is-invalid @enderror" placeholder="Input company name"
                            required autofocus>

                        @error('namecompany')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- TAGLINE --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Tagline
                        </label>

                        <input type="text" id="takeline" name="takeline" value="{{ old('takeline') }}"
                            class="form-control @error('takeline') is-invalid @enderror" placeholder="Input company tagline"
                            required>

                        @error('takeline')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Company Description
                        </label>

                        <textarea name="deccompany" rows="5" class="form-control @error('deccompany') is-invalid @enderror"
                            placeholder="Write company description..." required>{{ old('deccompany') }}</textarea>

                        @error('deccompany')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- LOGO --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Company Logo
                        </label>

                        <div class="border rounded-4 p-4 bg-light text-center">

                            <img id="imgPreview" class="img-fluid rounded-4 shadow-sm mb-3"
                                style="display:none;max-height:220px;">

                            <input type="file" id="logo" name="logo"
                                class="form-control @error('logo') is-invalid @enderror" onchange="previewImage()">

                            <small class="text-muted d-block mt-2">
                                Upload PNG, JPG or JPEG (Maximum 2 MB).
                            </small>

                        </div>

                        @error('logo')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('namecompany.index') }}" class="btn btn-light rounded-4 px-4">

                        Cancel

                    </a>

                    <button type="submit" class="btn btn-primary rounded-4 px-4">

                        <i class="bi bi-check-circle me-2"></i>
                        Create Company

                    </button>

                </div>

            </form>

        </div>

    </div>

    <script>
        function previewImage() {

            const image = document.getElementById('logo');
            const preview = document.getElementById('imgPreview');

            if (image.files.length > 0) {

                preview.src = URL.createObjectURL(image.files[0]);
                preview.style.display = 'block';

            }

        }
    </script>
@endsection
