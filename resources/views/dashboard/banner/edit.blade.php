@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Edit <span>Banner</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Update banner information and image.
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

            <form action="/dashboard/banner/{{ $banner->id }}" method="POST" enctype="multipart/form-data">

                @method('PUT')
                @csrf

                <input type="hidden" name="oldImage" value="{{ $banner->image }}">

                <div class="row g-4">

                    {{-- TITLE --}}
                    <div class="col-md-8">

                        <label class="form-label fw-semibold">
                            Banner Title
                        </label>

                        <input type="text" name="title" value="{{ old('title', $banner->title) }}"
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

                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                {{ $banner->is_active ? 'checked' : '' }}>

                            <label class="form-check-label fw-medium ms-2" id="labelSwitch">

                                {!! $banner->is_active
                                    ? '<span class="text-success">Active</span>'
                                    : '<span class="text-danger">Inactive</span>' !!}

                            </label>

                        </div>

                    </div>

                    {{-- IMAGE --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Banner Image
                        </label>

                        <div class="border rounded-4 p-4 bg-light text-center">

                            <img id="imgPreview" src="{{ $banner->image ? asset('storage/' . $banner->image) : '' }}"
                                class="img-fluid rounded-4 shadow-sm mb-3 {{ $banner->image ? '' : 'd-none' }}"
                                style="max-width:700px; max-height:320px; object-fit:cover;">

                            <input type="file" id="image" name="image"
                                class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">

                            @error('image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('banner.index') }}" class="btn btn-light rounded-4 px-4">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary rounded-4 px-4">

                        <i class="bi bi-check-circle me-2"></i>

                        Update Banner

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

        switchInput.addEventListener('change', function() {

            label.innerHTML = this.checked ?
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
            transition: .3s ease;
        }
    </style>
@endsection
