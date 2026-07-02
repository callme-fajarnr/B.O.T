@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Edit <span>Company</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Update company information and logo.
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

            <form action="/dashboard/namecompany/{{ $namecom->id }}" method="POST" enctype="multipart/form-data">

                @method('PUT')
                @csrf

                <div class="row g-4">

                    {{-- NAME COMPANY --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Company Name
                        </label>

                        <input type="text" id="namecompany" name="namecompany"
                            value="{{ old('namecompany', $namecom->namecompany) }}"
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

                        <input type="text" id="takeline" name="takeline"
                            value="{{ old('takeline', $namecom->takeline) }}"
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

                        <textarea id="deccompany" name="deccompany" rows="5"
                            class="form-control @error('deccompany') is-invalid @enderror" placeholder="Write company description..." required>{{ old('deccompany', $namecom->deccompany) }}</textarea>

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

                        <input type="hidden" name="oldLogo" value="{{ $namecom->logo }}">

                        <div class="border rounded-4 p-4 bg-light">

                            <div class="text-center mb-3">

                                @if ($namecom->logo)
                                    <img src="{{ asset('storage/' . $namecom->logo) }}" id="imgPreview"
                                        class="img-fluid rounded-4 shadow-sm"
                                        style="display:block;max-width:300px;max-height:220px;object-fit:contain;">
                                @else
                                    <img id="imgPreview" class="img-fluid rounded-4 shadow-sm"
                                        style="display:none;max-width:300px;max-height:220px;object-fit:contain;">
                                @endif

                            </div>

                            <input type="file" id="logo" name="logo"
                                class="form-control @error('logo') is-invalid @enderror" onchange="previewImage()">

                            <small class="text-muted d-block text-center mt-2">
                                Leave empty if you don't want to change the logo.
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
                        Update Company

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
