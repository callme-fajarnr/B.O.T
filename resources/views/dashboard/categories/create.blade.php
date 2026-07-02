@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Create <span>Category</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Create a new category and upload its logo.
                </p>
            </div>

            <a href="{{ route('categories.index') }}" class="btn btn-light rounded-4 px-4 shadow-sm">
                <i class="bi bi-arrow-left me-2"></i>
                Back
            </a>

        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">

            <form action="/dashboard/categories" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">

                    {{-- NAME --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Category Name
                        </label>

                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Input category name"
                            required autofocus>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- SLUG --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Slug
                        </label>

                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                            class="form-control @error('slug') is-invalid @enderror" placeholder="Generated slug" required>

                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- IMAGE --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Category Logo
                        </label>

                        <div class="border rounded-4 p-4 bg-light text-center">

                            <img class="img-preview img-fluid rounded-4 shadow-sm mb-3 d-none" style="max-height:220px;">

                            <input type="file" id="image" name="image"
                                class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">

                            <small class="text-muted d-block mt-2">
                                Upload category logo (JPG, PNG, WEBP).
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

                    <a href="{{ route('categories.index') }}" class="btn btn-light rounded-4 px-4">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary rounded-4 px-4">
                        <i class="bi bi-check-circle me-2"></i>
                        Create Category
                    </button>

                </div>

            </form>

        </div>
    </div>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/post/checkSlug?tittle=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.classList.remove('d-none');

            const reader = new FileReader();
            reader.readAsDataURL(image.files[0]);

            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
@endsection
