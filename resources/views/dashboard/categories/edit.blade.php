@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Edit <span>Category</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Update category information and logo.
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

            <form action="/dashboard/categories/{{ $category->slug }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <input type="hidden" name="oldImage" value="{{ $category->image }}">

                <div class="row g-4">

                    {{-- NAME --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Category Name
                        </label>

                        <input type="text" id="tittle" name="name" value="{{ old('name', $category->name) }}"
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

                        <input type="text" id="slug" name="slug" value="{{ old('slug', $category->slug) }}"
                            class="form-control @error('slug') is-invalid @enderror" placeholder="Generated slug" required>

                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- IMAGE --}}
                    <div class="border rounded-4 p-4 bg-light">

                        <div class="text-center">

                            @if ($category->image)
                                <img id="imgPreview" src="{{ asset('storage/' . $category->image) }}"
                                    class="img-fluid rounded-4 shadow-sm mb-3"
                                    style="display:block;max-width:100%;max-height:220px;margin:auto;object-fit:contain;">
                            @else
                                <img id="imgPreview" class="img-fluid rounded-4 shadow-sm mb-3"
                                    style="display:none;max-width:100%;max-height:220px;margin:auto;object-fit:contain;">
                            @endif

                        </div>

                        <input type="file" id="image" name="image"
                            class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">

                        <small class="text-muted d-block mt-2 text-center">
                            Leave empty if you don't want to change the logo.
                        </small>

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('categories.index') }}" class="btn btn-light rounded-4 px-4">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary rounded-4 px-4">
                        <i class="bi bi-check-circle me-2"></i>
                        Update Category
                    </button>

                </div>

            </form>

        </div>
    </div>

    <script>
        const tittle = document.querySelector('#tittle');
        const slug = document.querySelector('#slug');

        tittle.addEventListener('change', function() {
            fetch('/dashboard/post/checkSlug?tittle=' + tittle.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        function previewImage() {
            const image = document.getElementById('image');
            const preview = document.getElementById('imgPreview');

            if (image.files.length > 0) {
                preview.src = URL.createObjectURL(image.files[0]);
                preview.style.display = 'block';
            }
        }
    </script>
@endsection
