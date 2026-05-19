@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/post" method="POST" class="mb-5" enctype="multipart/form-data">
            @csrf

            <div class="row">

                {{-- TITLE & SLUG --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" id="tittle" class="form-control @error('tittle') is-invalid @enderror"
                        name="tittle" value="{{ old('tittle') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror"
                        name="slug" value="{{ old('slug') }}">
                </div>

                {{-- CATEGORY --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- VIDEO UPLOAD --}}
                <div class="col-md-6 mb-3">
                    <label for="video" class="form-label">Upload Video</label>

                    <video class="video-preview w-100 rounded mb-2" style="display:none; max-height:200px;" controls>
                    </video>

                    <input type="file" class="form-control @error('video') is-invalid @enderror" id="video"
                        name="video" accept="video/mp4,video/webm,video/quicktime">

                    @error('video')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- YOUTUBE LINK --}}
                <div class="col-12 mb-3">
                    <label class="form-label">Youtube Link (optional)</label>
                    <input type="text" class="form-control" name="link" value="{{ old('link') }}">
                </div>

                {{-- IMAGES --}}
                @for ($i = 1; $i <= 5; $i++)
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Image {{ $i }}</label>

                        <img class="img-preview{{ $i }} img-fluid mb-2 rounded"
                            style="display:none; height:120px; width:100%; object-fit:cover;">

                        <input type="file" class="form-control" id="image{{ $i }}"
                            name="image{{ $i == 1 ? '' : $i }}" onchange="previewImage({{ $i }})">
                    </div>
                @endfor

                {{-- BODY --}}
                <div class="col-12 mb-3">
                    <label class="form-label">Body</label>
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                </div>

                {{-- CREDIT --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Video & Edit By</label>
                    <input type="text" class="form-control mb-2" name="videoeditby">
                    <input type="text" class="form-control" name="igvideo">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Photos By</label>
                    <input type="text" class="form-control mb-2" name="photoby">
                    <input type="text" class="form-control" name="igphoto">
                </div>

                {{-- ACTORS --}}
                @for ($i = 1; $i <= 3; $i++)
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Actor {{ $i }}</label>
                        <input type="text" class="form-control mb-2" name="aktor{{ $i }}">
                        <input type="text" class="form-control" name="igaktor{{ $i }}">
                    </div>
                @endfor

            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
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
