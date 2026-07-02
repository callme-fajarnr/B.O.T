@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Create <span>Banner</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Add a new banner for your homepage.
                </p>
            </div>

            <a href="{{ route('banner.index') }}" class="btn btn-light rounded-4 px-4 shadow-sm">
                <i class="bi bi-arrow-left me-2"></i>
                Back
            </a>

        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">

            <form action="/dashboard/banner" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">

                    {{-- TITLE --}}
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">
                            Banner Title
                        </label>

                        <input type="text" name="title" value="{{ old('title') }}"
                            class="form-control @error('title') is-invalid @enderror" placeholder="Input banner title">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- STATUS --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold d-block">
                            Status
                        </label>

                        <div class="form-check form-switch mt-2">

                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>

                            <label class="form-check-label fw-medium ms-2" id="labelSwitch">

                                Active

                            </label>

                        </div>

                    </div>

                    {{-- IMAGE --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Banner Image
                        </label>

                        <div class="border rounded-4 p-4 bg-light text-center">

                            <img class="img-preview img-fluid rounded-4 shadow-sm mb-3"
                                style="display:none;max-height:260px;">

                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                onchange="previewImage()">

                            <small class="text-muted d-block mt-2">
                                Recommended image size: 1920 × 800 px
                            </small>

                        </div>

                        @error('image')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('banner.index') }}" class="btn btn-light rounded-4 px-4">

                        Cancel

                    </a>

                    <button type="submit" class="btn btn-primary rounded-4 px-4">

                        <i class="bi bi-check-circle me-2"></i>

                        Create Banner

                    </button>

                </div>

            </form>

        </div>
    </div>

    <script>
        function previewImage() {

            const image = document.querySelector('[name="image"]');
            const preview = document.querySelector('.img-preview');

            if (image.files.length > 0) {
                preview.src = URL.createObjectURL(image.files[0]);
                preview.style.display = "block";
            }
        }

        const switchInput = document.getElementById('is_active');
        const label = document.getElementById('labelSwitch');

        switchInput.addEventListener('change', () => {
            label.innerHTML = switchInput.checked ?
                '<span class="text-success fw-semibold">Active</span>' :
                '<span class="text-danger fw-semibold">Inactive</span>';
        });
    </script>

    <style>
        .form-switch .form-check-input {
            width: 3.3rem;
            height: 1.7rem;
            cursor: pointer;
        }

        .img-preview {
            transition: .3s;
        }
    </style>
@endsection
