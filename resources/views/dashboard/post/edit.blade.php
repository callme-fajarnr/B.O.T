@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Edit <span>Post</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Update post information before publishing.
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
            <form action="/dashboard/post/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="row">

                    {{-- Title --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" id="tittle" class="form-control @error('tittle') is-invalid @enderror"
                            name="tittle" value="{{ old('tittle', $post->tittle) }}">
                    </div>

                    {{-- Slug --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror"
                            name="slug" value="{{ old('slug', $post->slug) }}">
                    </div>

                    {{-- Category --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Video --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Video
                        </label>

                        <input type="hidden" name="oldVideo" value="{{ $post->video }}">

                        <div class="border rounded-4 bg-light p-3">

                            @if ($post->video)
                                <video src="{{ asset('storage/' . $post->video) }}"
                                    class="video-preview w-100 rounded-3 mb-3" style="max-height:220px;" controls>
                                </video>
                            @else
                                <video class="video-preview w-100 rounded-3 mb-3" style="display:none;max-height:220px;"
                                    controls>
                                </video>
                            @endif

                            <input type="file" id="video" name="video" class="form-control">

                            <small class="text-muted mt-2 d-block">
                                Leave empty if you don't want to change the video.
                            </small>

                        </div>

                    </div>

                    {{-- YOUTUBE LINK --}}
                    <div class="col-12 mb-3">
                        <label class="form-label">Youtube Link (optional)</label>
                        <input type="text" class="form-control" name="link" value="{{ old('link', $post->link) }}">
                    </div>

                    {{-- Images --}}
                    @for ($i = 1; $i <= 5; $i++)
                        @php
                            $imgField = $i == 1 ? 'image' : 'image' . $i;
                        @endphp

                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Image {{ $i }}
                            </label>

                            <div class="border rounded-4 bg-light p-3">

                                <input type="hidden" name="oldImage{{ $i }}" value="{{ $post->$imgField }}">

                                @if ($post->$imgField)
                                    <img src="{{ asset('storage/' . $post->$imgField) }}"
                                        class="img-preview{{ $i }} img-fluid rounded-4 shadow-sm mb-3"
                                        style="width:100%;height:220px;object-fit:cover;">
                                @else
                                    <img class="img-preview{{ $i }} img-fluid rounded-4 shadow-sm mb-3"
                                        style="display:none;width:100%;height:220px;object-fit:cover;">
                                @endif

                                <input type="file" id="image{{ $i }}" name="{{ $imgField }}"
                                    class="form-control" onchange="previewImage({{ $i }})">

                                <small class="text-muted mt-2 d-block">
                                    Leave empty if you don't want to replace this image.
                                </small>

                            </div>

                        </div>
                    @endfor

                    {{-- Body --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Content
                        </label>

                        <div class="border rounded-4 bg-light p-3">

                            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">

                            <trix-editor input="body"></trix-editor>

                        </div>

                    </div>

                    {{-- Credit --}}
                    <div class="col-md-6">

                        <div class="border rounded-4 bg-light p-4 h-100">

                            <h6 class="fw-bold mb-3">
                                <i class="bi bi-camera-video me-2"></i>
                                Video & Edit Credit
                            </h6>

                            <input type="text" class="form-control mb-3" name="videoeditby"
                                value="{{ old('videoeditby', $post->videoeditby) }}" placeholder="Video & Edit By">

                            <input type="text" class="form-control" name="igvideo"
                                value="{{ old('igvideo', $post->igvideo) }}" placeholder="Instagram">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="border rounded-4 bg-light p-4 h-100">

                            <h6 class="fw-bold mb-3">
                                <i class="bi bi-camera me-2"></i>
                                Photo Credit
                            </h6>

                            <input type="text" class="form-control mb-3" name="photoby"
                                value="{{ old('photoby', $post->photoby) }}" placeholder="Photos By">

                            <input type="text" class="form-control" name="igphoto"
                                value="{{ old('igphoto', $post->igphoto) }}" placeholder="Instagram">

                        </div>

                    </div>

                    {{-- Actors --}}
                    <div class="col-12">

                        <h5 class="fw-bold">
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
                                    value="{{ old('aktor' . $i, $post->{'aktor' . $i}) }}" placeholder="Actor Name">

                                <input type="text" class="form-control" name="igaktor{{ $i }}"
                                    value="{{ old('igaktor' . $i, $post->{'igaktor' . $i}) }}" placeholder="Instagram">

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

                        Update Post

                    </button>

                </div>
            </form>
        </div>

        <script>
            const tittle = document.querySelector('#tittle');
            const slug = document.querySelector('#slug');

            tittle.addEventListener('change', function() {
                fetch('/dashboard/post/checkSlug?tittle=' + tittle.value)
                    .then(res => res.json())
                    .then(data => slug.value = data.slug)
            });

            // preview image universal
            function previewImage(i) {
                const input = document.querySelector('#image' + i);
                const preview = document.querySelector('.img-preview' + i);

                preview.style.display = 'block';

                const reader = new FileReader();
                reader.readAsDataURL(input.files[0]);

                reader.onload = e => preview.src = e.target.result;
            }

            // preview video
            function previewVideo() {
                const input = document.querySelector('#video');
                const preview = document.querySelector('.video-preview');

                preview.style.display = 'block';

                const reader = new FileReader();
                reader.readAsDataURL(input.files[0]);

                reader.onload = e => preview.src = e.target.result;
            }
        </script>
    @endsection
