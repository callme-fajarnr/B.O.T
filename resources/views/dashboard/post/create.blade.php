@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Create <span>Post</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Create a new post and publish it to your website.
                </p>
            </div>

            <a href="{{ route('post.index') }}" class="btn btn-light rounded-4 px-4 shadow-sm">

                <i class="bi bi-arrow-left me-2"></i>
                Back

            </a>

        </div>
    </div>
    <div class="card">
        <div class="card-body p-4">

            <form action="/dashboard/post" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- TITLE --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Title
                        </label>

                        <input type="text" id="tittle" name="tittle" value="{{ old('tittle') }}"
                            class="form-control @error('tittle') is-invalid @enderror" placeholder="Enter post title">

                        @error('tittle')
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
                            class="form-control @error('slug') is-invalid @enderror" placeholder="Auto generated slug">

                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- CATEGORY --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Category
                        </label>

                        <select class="form-select" name="category_id">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>
                            @endforeach

                        </select>

                    </div>

                    {{-- VIDEO --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Upload Video
                        </label>

                        <div class="border rounded-4 bg-light p-3">

                            <video class="video-preview w-100 rounded-3 mb-3" style="display:none;max-height:230px;"
                                controls>
                            </video>

                            <input type="file" id="video" name="video"
                                accept="video/mp4,video/webm,video/quicktime"
                                class="form-control @error('video') is-invalid @enderror">

                            <small class="text-muted d-block mt-2">
                                Supported: MP4, WEBM, MOV
                            </small>

                        </div>

                        @error('video')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- YOUTUBE --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Youtube Link
                        </label>

                        <input type="text" name="link" value="{{ old('link') }}" class="form-control"
                            placeholder="https://youtube.com/...">

                    </div>

                    {{-- IMAGES --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Gallery Images
                        </label>

                    </div>

                    @for ($i = 1; $i <= 5; $i++)
                        <div class="col-md-6">

                            <div class="border rounded-4 bg-light p-3 h-100">

                                <label class="form-label fw-semibold">
                                    Image {{ $i }}
                                </label>

                                <img class="img-preview{{ $i }} img-fluid rounded-4 shadow-sm mb-3"
                                    style="display:none;width:100%;height:220px;object-fit:cover;">

                                <input type="file" id="image{{ $i }}" name="image{{ $i == 1 ? '' : $i }}"
                                    class="form-control" onchange="previewImage({{ $i }})">

                                <small class="text-muted mt-2 d-block">
                                    Upload image {{ $i }}
                                </small>

                            </div>

                        </div>
                    @endfor

                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Content
                        </label>

                        <div class="border rounded-4 p-3 bg-light">

                            <input id="body" type="hidden" name="body" value="{{ old('body') }}">

                            <trix-editor input="body"></trix-editor>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="border rounded-4 bg-light p-4 h-100">

                            <h6 class="fw-bold mb-3">
                                <i class="bi bi-camera-video me-2"></i>
                                Video & Edit Credit
                            </h6>

                            <input type="text" class="form-control mb-3" name="videoeditby"
                                placeholder="Video & Edit By">

                            <input type="text" class="form-control" name="igvideo" placeholder="Instagram">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="border rounded-4 bg-light p-4 h-100">

                            <h6 class="fw-bold mb-3">
                                <i class="bi bi-camera me-2"></i>
                                Photo Credit
                            </h6>

                            <input type="text" class="form-control mb-3" name="photoby" placeholder="Photos By">

                            <input type="text" class="form-control" name="igphoto" placeholder="Instagram">

                        </div>

                    </div>

                    <div class="col-12">

                        <h5 class="fw-bold mb-3">
                            Actors
                        </h5>

                    </div>

                    @for ($i = 1; $i <= 3; $i++)
                        <div class="col-md-4">

                            <div class="border rounded-4 bg-light p-4 h-100">

                                <h6 class="fw-semibold mb-3">
                                    Actor {{ $i }}
                                </h6>

                                <input type="text" class="form-control mb-3" name="aktor{{ $i }}"
                                    placeholder="Actor Name">

                                <input type="text" class="form-control" name="igaktor{{ $i }}"
                                    placeholder="Instagram">

                            </div>

                        </div>
                    @endfor

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('post.index') }}" class="btn btn-light rounded-4 px-4">

                        Cancel

                    </a>

                    <button type="submit" class="btn btn-primary rounded-4 px-4">

                        <i class="bi bi-check-circle me-2"></i>

                        Create Post

                    </button>

                </div>
                {{-- ================= JS ================= --}}
                <script>
                    // AUTO SLUG
                    const tittle = document.querySelector('#tittle');
                    const slug = document.querySelector('#slug');

                    tittle.addEventListener('change', function() {
                        fetch('/dashboard/post/checkSlug?tittle=' + tittle.value)
                            .then(res => res.json())
                            .then(data => slug.value = data.slug)
                    });


                    // IMAGE PREVIEW (TETAP STYLE LAMA)
                    function previewImage(i) {
                        const input = document.querySelector('#image' + i);
                        const preview = document.querySelector('.img-preview' + i);

                        if (input.files && input.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.style.display = 'block';
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }


                    // VIDEO PREVIEW
                    document.querySelector('#video').addEventListener('change', function() {
                        const preview = document.querySelector('.video-preview');
                        const file = this.files[0];

                        if (file) {
                            preview.src = URL.createObjectURL(file);
                            preview.style.display = 'block';
                        }
                    });
                </script>
            @endsection
